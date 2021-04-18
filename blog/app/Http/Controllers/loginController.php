<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class loginController extends Controller
{
	//Login
    public function viewLogin()
    {
    	return view('login');
    }
    public function checkLogin(Request $re)
    {
    		$result = DB::table('users')->where('email',$re->email)->where('password',$re->password)->first();
    		if($result)
    		{
	    		Session::put('khEmail',$result->email);
	    		Session::put('khName',$result->name);
	    		Session::forget('note_err');
                
	    		return Redirect('/trang-chu');
    		}
    		else
    		{
    			Session::put('note_err','Tai khoan hoac mat khau khong chinh xac');
    			return Redirect::to('/login');
    		}
    }
    //Logout
    public function logout()
    {
    	Session::forget('khEmail');
    	Session::forget('khName');
    	return Redirect('/trang-chu');
    }
}
