<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Invoice;
use App\User;

class AdminController extends Controller
{
	 public function __construct()
    {
        $this->middleware('guest')->only('login_get', 'login_post');
        $this->middleware('auth')->except('login_get', 'login_post');
    }
    //
    public function login_get(){
    	return view('login');
    }

    public function login_post(Request $request){
    	$userdata = array(
        'email'     => $request->email,
        'password'  => $request->password,
        'role' => '1'
    );

    	if (Auth::attempt($userdata)) {
    		return redirect('/admin');
    	}

    	 $request->session()->flash('failed', 'Invalid Credential or Not an Admin');

        return back();
    }

    public function admin(){

    	$invoices = Invoice::all();
    	$paids = Invoice::where('payment_status','!=','Invalid')->get();
    	$unpaids = Invoice::where('payment_status','Invalid')->get();
    	$users = User::all();
    	return view('admin.home',compact('invoices','paids','unpaids','users'));
    }

    public function mark_paid(Invoice $unpaid, Request $request){
        if ($unpaid->paid()) {
            $request->session()->flash('failed', 'InvoiceID. # '.$unpaid->invoice_id.' already marked Paid');
    	    return back();
        }
        $unpaid->update(["payment_status" => "Paid"]);
        $request->session()->flash('success', 'InvoiceID. # '.$unpaid->invoice_id.' marked Paid');
    	return back();
    }

    public function mark_unpaid(Invoice $paid, Request $request){
        if (!$paid->paid()) {
            $request->session()->flash('failed', 'InvoiceID. # '.$paid->invoice_id.' already marked UnPaid');
    	    return back();
        }
        $paid->update(["payment_status" => "Invalid"]);
        $request->session()->flash('success', 'InvoiceID. # '.$paid->invoice_id.' marked Paid');
    	return back();
    }
}
