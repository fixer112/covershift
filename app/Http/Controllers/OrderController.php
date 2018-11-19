<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function book($service)
    {
    	$list=[ 'Office-Porter'=> 13.50,
    		 	'SIA-Security'=> 14.50,
    		 	'Helping-Hands'=> 13.00,
    		 	'Event-Assistant'=> 13.00,
    		 	'Facilities-Assistant'=>13.50,
    		 	'Postman-Assistant'=>13.00,
    		 	'Kitchen-Porter'=>12.50,
    		 	'Kitchen-Assistant'=>12.00
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
}
