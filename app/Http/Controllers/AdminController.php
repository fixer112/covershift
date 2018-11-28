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
}
