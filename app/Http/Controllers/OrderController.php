<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;
use App\Invoice;
use App\User;
use Carbon\Carbon;
use Konekt\PdfInvoice\InvoicePrinter;
use App\Notifications\OrderBooked;
use App\Notifications\OrderSuccess;
use Illuminate\Support\Facades\Mail;
use App\Mail\Work;
use Log;

class OrderController extends Controller
{
	protected $provider;
	protected $reciept;

	 public function __construct()
    {
    	$this->provider = new ExpressCheckout;
    	$this->reciept = new InvoicePrinter('A4','£','en');

    }
    public function book($service)
    {
    	$list=[ 'Office-Porter'=> 14.00,
    		 	'SIA-Security'=> 14.50,
    		 	'Helping-Hands'=> 14.00,
    		 	'Event-Assistant'=> 13.75,
    		 	'Facilities-Assistant'=>13.50,
    		 	'Postroom-Assistant'=>13.50,
    		 	'Kitchen-Porter'=>13.00,
    		 	'Kitchen-Assistant'=>13.00
    		 ];
    	session(['service' => $service]);
    	session(['price' => $list[$service]]);
        return redirect('details');
    }

    public function details()
    {	
    	if (session('price')) {
    	$service = session('service');
    	$price = session('price');
        return view('details',compact('service','price'));
    	}
    	return redirect('/');
    }

    public function summary(Request $request, $id){
    	$invoice = Invoice::where('invoice_id', $id)->first();
    	if (!$invoice) {
    		$request->session()->flash('failed', 'Order does not exist');
    			return view('/alert');
    	}
        $user = $invoice->user;

        if (!$user->email_verified_at) {
                $user->update(['verify' => str_random(60)]);
                $url = url('/verify/'.$user->verify.'/?invoice='.$invoice->id);
                //return redirect('/verify/'.$user->verify.'/'.$invoice->id);
                $request->session()->flash('failed', 'Please Confirm your email by clicking on the link sent to your email ('.$user->email.') and complete transaction');
                return view('/alert');
                //return '<a href="'.$url.'">Verify</a>';
            }
            
    	return view('summary',compact('invoice'));
    }

    public function getCart(Invoice $invoice){
    	return [
    		'items'=>[
    			 [
    	        'name' => $invoice->title,
    	        'price' => $invoice->total,
    	        'qty' => 1,
    	    	],
    		],
    		'invoice_id' => $invoice->invoice_id,
    		'invoice_description' => $invoice->description,
    		'return_url' => url('/success'),
    		'cancel_url' => url('/cancel'),
    		'total' => $invoice->total,
    	];

    }

    public function payment(Request $request){
    	//return $request->all();
    	//$this->provider = new ExpressCheckout;      // To use express checkout.
    	//$provider = new AdaptivePayments;     // To use adaptive payments.
    	//return $request->all();
        $company = $request->company_name ? $request->company_name : ' ';
    	$this->validate($request, [

    				'service' => 'required|string|max:50',
                    'email' => 'required|email',
                    'addr' => 'required|string|max:100',
		            'mobile' => 'required|numeric',
		            'price' => 'required',
		            'van' => 'required',
		            'to' => 'required',
		            'from' => 'required',
		            'days_needed' => 'required',
		            'dates' => 'required',
		            'staff_num' => 'required',
		            'shift_hour' => 'required',
		            'summary' => 'required',
		            'total' => 'required',

    		]);
    	$request->session()->forget('price');
    	$request->session()->forget('service');
    	if (!$request->price) {
    		return redirect('/');
    	}
    	//$user = User::where('email', $request->email)->where('email_verified_at', '!=', '')->first();
    	$user = User::where('email', $request->email)->first();
    	
    	
    		if (!$user) {
    		$user =User::create([
    			'fname' => $request->fname,
    			'lname' => $request->lname,
    			'email' => $request->email,
    			'company_name' => $company,
    			'mobile' => $request->mobile,
    			'password' => bcrypt('reset'),
                'address' => $request->addr,
    		]);

    		}else{
    			$user->update([
    			'fname' => $request->fname,
    			'lname' => $request->lname,
    			'email' => $request->email,
    			'company_name' => $company,
    			'mobile' => $request->mobile,
                'address' => $request->addr,
    			]);
    		}
    		
    	//}
    		$user_id = $user->id;

    	$invoice = Invoice::create([
    		'title' => str_replace('-', ' ', $request->service),
    		'user_id' => $user_id,
    		'price' => $request->price,
    		'van' => $request->van == 1 ? true:false,
    		'van_hour' => $request->van_hour ? $request->van_hour : 0,
    		'to' => $request->to,
    		'from' => $request->from,
    		'days_needed' => $request->days_needed,
    		'dates' => $request->dates,
    		'staff_num' => $request->staff_num,
    		'shift_hour' => $request->shift_hour,
    		'summary' => $request->summary,
    		'total' => $request->total,
            'name' => $request->fname.' '.$request->lname,
            'email' => $request->email,
            'company_name' => $company,
            'mobile' => $request->mobile,
            'address' => $request->addr,
    	]);

    	$invoice->update([
    		'invoice_id' => rand(10000, 90000).$invoice->id,
    		//'description' => "Order for service ".$invoice->title." invoice id # ".$invoice->invoice_id,

    	]);

    	$invoice->update([
    		//'invoice_id' => time().$invoice->id,
    		'description' => "Order for service ".$invoice->title." invoice id # ".$invoice->invoice_id,

    	]);
    	/*$invoice->invoice_id = time().$invoice->id;
    	$invoice->description = "Order for service ".$invoice->title." invoice id # ".$invoice->invoice_id;*/

    	


            //if user does not exist, user verifies email first
    		if (!$user->email_verified_at) {
    			$user->update(['verify' => str_random(60)]);
    			$url = url('/verify/'.$user->verify.'/?invoice='.$invoice->id);
    			//return redirect('/verify/'.$user->verify.'/'.$invoice->id);

    			$subject = 'Confirm Email to continue Order # '.$invoice->invoice_id;
    			$msg = 'Order #'.$invoice->invoice_id.' successfully booked, please click the link below to confirm your email and continue with payment';
    			try {
    				
    			$user->notify(new OrderBooked($user->fname, $subject, $msg,'Confirm Email', $url ));

    			} catch (Exception $e) {
    				Log::error($e);
    			}

    			$request->session()->flash('verify', 'Please Confirm your email by clicking on the link sent to your email and complete transaction');
    			return view('/alert');
    			//return '<a href="'.$url.'">Verify</a>';
    		}else{

    		//return redirect('make_payment/'.$invoice->id);
    			$subject = 'Order #'.$invoice->invoice_id;
    			$msg = 'Order #'.$invoice->invoice_id.' successfully booked, please click the link below to continue with payment';
    			$url = url('summary/'.$invoice->invoice_id);
    			try {
    				
    			$user->notify(new OrderBooked($user->fname, $subject, $msg,'Continue Payment', $url ));
    			} catch (Exception $e) {
    				Log::error($e);
    			}
    			return redirect('summary/'.$invoice->invoice_id);
    		}
    	
    	/*$data = $this->getCart($invoice);
    	

    	//give a discount of 10% of the order amount
    	//$data['shipping_discount'] = round((10 / 100) * $total, 2);
    	$response = $this->provider->setExpressCheckout($data);

    	 // This will redirect user to PayPal
    	return redirect($response['paypal_link']);
    	//return $response;*/
    }

    public function make_payment(Invoice $invoice, Request $request){
    	$data = $this->getCart($invoice);
    	
    	if ($invoice->paid()) {
    		$request->session()->flash('failed', 'Payment has already been made for this InvoiceID. # '.$invoice->invoice_id);
    	        return redirect('/');
    	}
    	//give a discount of 10% of the order amount
    	//$data['shipping_discount'] = round((10 / 100) * $total, 2);
    	$response = $this->provider->setExpressCheckout($data);

    	 // This will redirect user to PayPal
    	return redirect($response['paypal_link']);
    	//return $response;
    }

    public function success(Request $request) {
    	//$provider = new ExpressCheckout;

    	$token = $request->get('token');

    	$PayerID = $request->get('PayerID');

    	$response = $this->provider->getExpressCheckoutDetails($token);

    	//return $response;
        // if response ACK value is not SUCCESS or SUCCESSWITHWARNING
        // we return back with error
        if (!in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
        	$request->session()->flash('failed', 'Error processing PayPal payment');
            return view('/alert');
        }
        $invoice = Invoice::where('invoice_id',($response['INVNUM']))->first();
        $user = $invoice->user;

        if ($invoice->paid()) {
        	$request->session()->flash('failed', 'Payment has already been made for this InvoiceID. # '.$invoice->invoice_id);
            return view('/alert');
        }
        $data = $this->getCart($invoice);
        $payment_status = $this->provider->doExpressCheckoutPayment($data, $token, $PayerID);
        if ($payment_status['ACK'] == 'Failure') {
        	$request->session()->flash('failed', $payment_status['L_LONGMESSAGE0']." #".$invoice->invoice_id);
            return view('/alert');
        }

        $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
        $invoice->update([
        	'payment_status' => $status,
        ]);

        if (!$invoice->paid()) {
        	$request->session()->flash('failed', 'Error processing PayPal payment for Order #' . $invoice->invoice_id . '!');
            return view('/alert');
        }

        $this->reciept($invoice);

        try {
        $user->notify(new OrderSuccess($invoice));
        } catch (Exception $e) {
        	Log::error($e);
        }

        $request->session()->flash('success', 'Order #' . $invoice->invoice_id . ' has been paid successfully!');
        $request->session()->flash('download', '/download/'. $invoice->invoice_id);
        //response()->file(public_path('/reciept/'. $invoice->invoice_id.'pdf'));

            return view('/alert');
        //return $status;
        //return $payment_status;
    }

    public function verify_user(Request $request, $verify){
    	$user = User::where('verify', $verify)->first();
    	if ($user) {
    		$user->update(['email_verified_at' => Carbon::now(), 'verify' => '']);
    	}else{
    		$request->session()->flash('failed', 'Email already verified or Invalid verification token');
    		return redirect('/alert');
    	}
    	if ($request->invoice) {
    		$invoice = Invoice::find($request->invoice);

    	if ($invoice) {

            $subject = 'Order #'.$invoice->invoice_id;
            $msg = 'Order #'.$invoice->invoice_id.' successfully booked, please click the link below to continue with payment';
            $url = url('summary/'.$invoice->invoice_id);
            try {
                
            $user->notify(new OrderBooked($user->fname, $subject, $msg,'Continue Payment', $url ));
            } catch (Exception $e) {
                Log::error($e);
            }
    			/*if ($invoice->paid()) {
    				$request->session()->flash('failed', 'Payment has already been made for this InvoiceID. # '.$invoice->invoice_id);
    	        return redirect('/');
    			}else{
    				
    			return redirect('make_payment/'.$invoice->id);
    			//return 'no';
    			}*/

    			return redirect('summary/'.$invoice->invoice_id);
    		}else{
    			$request->session()->flash('failed', 'InvoiceID. # '.$invoice->invoice_id.' does not exist');
    	        return view('/alert');
    		}
    	}


    }

    public function reciept(Invoice $invoice){
    	$user = $invoice->user;
    	$name = $user->fname.' '.$user->lname;
    	$company = $user->company_name;
    	//return $user->company_name;
    	/* Header settings */
    	 $this->reciept->setLogo(public_path('logo.png'));   //logo image path
    	 $this->reciept->setColor("#007fff");      // pdf color scheme
    	 $this->reciept->setType("Service Invoice");    // Invoice Type
    	 $this->reciept->setReference($invoice->invoice_id);   // Reference
    	 $this->reciept->setDate(date('M dS ,Y',time()));   //Billing Date
    	 $this->reciept->setTime(date('h:i:s A',time()));   //Billing Time
    	 //$this->reciept->setDue(date('M dS ,Y',strtotime('+3 months')));    // Due Date
    	 $this->reciept->setFrom(array("CoverShift","CoverShift","34 New House,67-68 Hatton Garden, London","London, EC1N 8JY UK"));
    	 $this->reciept->setTo(array($invoice->name,$invoice->company_name,"",""));
    	 
    	 $this->reciept->addItem($invoice->title,$invoice->description,1,0,$invoice->price,0,$invoice->price * $invoice->shift_hour);
    	 /*
    	 $this->reciept->addItem("PDC-E5300","2.6GHz/1GB/320GB/SMP-DVD/FDD/VB",4,0,645,0,2580);
    	 $this->reciept->addItem('LG 18.5" WLCD',"",10,0,230,0,2300);
    	 $this->reciept->addItem("HP LaserJet 5200","",1,0,1100,0,1100);
    	 
    	 $this->reciept->addTotal("Total",$invoice->total);
    	 /*$this->reciept->addTotal("VAT 21%",1986.6);
    	 $this->reciept->addTotal("Total due",11446.6,true);*/
    	 
    	 $this->reciept->addBadge("Paid");
    	 
    	 $this->reciept->addTitle("Summary");
    	 
    	 $this->reciept->addParagraph("Service : ".$invoice->title);

    	 $this->reciept->addParagraph(" Price/Hour: ".$invoice->price);

    	 $this->reciept->addParagraph("Number of Days : ".$invoice->days_needed);

    	 $this->reciept->addParagraph("Number of Staff(s) : ".$invoice->staff_num);

    	 $this->reciept->addParagraph("Number of Hours(s) : ".$invoice->shift_hour);

    	 if ($invoice->van) {
    	 $this->reciept->addParagraph("Number of Hours needed for Van: ".$invoice->van_hour);
    	 }

    	 $this->reciept->addParagraph("Dates : ".$invoice->dates);

         $this->reciept->addParagraph("Address of work venue : ".$invoice->address);

    	 $this->reciept->addParagraph("Summary to staff : ".$invoice->summary);

         $this->reciept->addParagraph("");

         $this->reciept->addParagraph("");

    	 $this->reciept->addParagraph("If you have an update or correction for this order or would rather pay through an invoice, please send us a  mail vias helpinghands@cover-shift.co.uk");

         $this->reciept->setFooternote("Team CoverShift");

    	 /*if ($type == 'F') {
    	 	
    	 $this->reciept->render(public_path('/reciept/'.$invoice->invoice_id.'.pdf'),$type); 

    	 }else{
    	 	$this->reciept->render($invoice->invoice_id.'.pdf',$type); 
    	 }*/

    	 $this->reciept->render(public_path('/reciept/'.$invoice->invoice_id.'.pdf'),'F');
    	 //$this->reciept->render($invoice->invoice_id.'.pdf',$type);
         //return redirect('download/'.$invoice->invoice_id);
    	 
    }

    public function work(Request $request){

        $this->validate($request, [
                    'fname' => 'required|string|max:50',
                    'email' => 'required|email',
                    'number' => 'required|numeric',
                    //'addr' => 'required|string|max:100',
                    'lname' => 'required|string|max:50',
                    'postcode' => 'required',
                    'service' => 'required',
                    'accept' => 'required|accepted',
                     ]);

        //$reply = $request->email;
        //$name =  $request->fname.' '.$request->lname;
        $content = 'First Name : '.$request->fname.
                    '<br> Last Name : '.$request->lname.
                    '<br> Email : '.$request->email.
                    //'<br> Address : '.$request->addr.
                    '<br> PostCode : '.$request->postcode.
                    '<br> Mobile : '.$request->number.
                    '<br> Specialisation '.$request->service;
         Mail::to('helpinghands@cover-shift.co.uk')->send(new Work($content));

                $request->session()->flash('success', 'Email sent Successfully. We will get back to you soon');
                 return view('/alert');

    }

    public function kecMail(Request $request){
        $this->validate($request, [
                    'name' => 'required|string|max:50',
                    'email' => 'required|email|confirmed',
                    'number' => 'numeric',
                    'req' => 'required|max:500',
                     ]);

            $num = $request->number ? $request->number : 'None';
        //$reply = $request->email;
        //$name =  $request->fname.' '.$request->lname;
        $content = 'Name : '.$request->name.
                    '<br> Email : '.$request->email.
                    '<br> Contact Number : '.$num.
                    '<br> Request : '.$request->req;
         Mail::to('helpinghands@cover-shift.co.uk')->send(new Work($content, 'New Client Applied To Kitchen Equipment Cleaning'));

                $request->session()->flash('success', 'Email sent Successfully. We will get back to you soon');
                 return view('/alert');
    }


    
}