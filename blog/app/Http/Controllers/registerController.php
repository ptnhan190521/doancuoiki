<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class registerController extends Controller
{
    public function viewRegister()
    {
    	return view('register');
    }
     public function checkRegister(Request $re)
    {
    	if($re->name==null||$re->email==null||$re->password==null||$re->sdt==null)
    	{
    		$messages=[
    			'name.required'=>'Ten khach hang khong duoc de trong',
    			'email.required'=>'Email khach hang khong duoc de trong',
    			'password.required'=>'Password khong duoc de trong',
              
    			'sdt.required'=>'sdt khong duoc de trong',
    		];
    		$this->validate($re,[
    			'name'=>'required',
    			'email'=>'required',
    			'password'=>'required',
                
    			'sdt'=>'required',
    		],$messages);
    		$errors=$validate->errors();

    	}
    	else
    	{
            if($re->repassword == $re->password )
            {
        		$data = array();
        		$data['id'] = strlen($re->email).rand(0,1000);
        		$data['name'] = $re->name;
        		$data['email'] = $re->email;
        		$data['password'] = $re->password;
        		$data['sdt']=$re->sdt;
        		DB::table('users')->insert($data);
        		Session::put('note_sc','Đăng ký thành công');
                 Session::forget('repass_err');
        		return view('thongbaodangky');
            }
            else
            {
                Session::put('repass_err','Mat khau nhap lai phai giong voi mat khau dang ky');
                return Redirect::to('register');
            }
    		
    	}
    }
   public function viewThongbaodangky()
    	{
    		return view('thongbaodangky');
    	}
}
