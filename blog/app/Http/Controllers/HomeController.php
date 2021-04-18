<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use DB;	
session_start();
use Socialite;
use Illuminate\Support\Facades\Redirect;
class HomeController extends Controller
{
    public function getindex(){

    	$product=DB::table('tbl_product')->where('status','0')->orderby('price','desc')->limit(6)->paginate(3);
    	return view('pages.home')->with('product',$product);
    }
    public function Loginfb()
    {
    	return Socialite::driver('facebook')->redirect();
    }
     public function callfacebook(Request $request)
    {
    	$fbuser= Socialite::driver('facebook')->user();
    	 echo '<pre>';
        print_r($fbuser);
        echo '</pre>';
        $ttuser=DB::table('tbl_admin')->where('fb_id',$fbuser->id)->first();

        if(!$ttuser)
        {
        $data=array();
       
        $data['admin_name']=$fbuser->name;
        $data['fb_id']=$fbuser->id;
        $khachhang_id=DB::table('tbl_admin')->insertGetId($data);
       
        }
        $id=$fbuser->id;

        $result=DB::table('tbl_admin')->where('fb_id',$id)->first();
        if($result){
        Session::put('admin_id',$result->admin_id);
        Session::put('admin_name',$result->admin_name);
        return Redirect::to('/dashboard');
         }else
         {
             return redirect::to('/admin');
         }
    }
    public function search(Request $re)
    {
        $result=DB::table('tbl_product')->where('status','0')->orderby('price','desc')->paginate(3);
        if($re->price==0)
        {
            $result=DB::table('tbl_product')->whereBetween('price',[100000,150000])->where('name','like','%'.$re->key.'%')->paginate(5);
        }
        elseif($re->price==1)
        {
            $result=DB::table('tbl_product')->whereBetween('price',[150000,200000])->where('name','like','%'.$re->key.'%')->paginate(5);
        }
        elseif($re->price==2)
        {
            $result=DB::table('tbl_product')->whereBetween('price',[200000,250000])->where('name','like','%'.$re->key.'%')->paginate(5);
        }
        else
        {
            $result=DB::table('tbl_product')->whereBetween('price',[250000,300000])->where('name','like','%'.$re->key.'%')->paginate(5);
        }
        // if($re->pfrom!=null && $re->pto !=null && $re->key !=null)
        // {
        //  $result= DB::table('tbl_product')->whereBetween('price',[$re->pfrom,$re->pto])->where('name','like','%'.$re->key.'%')->paginate(5);
        // }
        // elseif($re->pfrom==null && $re->pto ==null && $re->key ==null)
        // {
        //  return Redirect::to('')->with('product',$result);
        // }
        // else
        // {
        //  if($re->pfrom ==null)
        //  {
        //      if($re->key!=null && $re->pto !=null)
        //      {
                    // $result= DB::table('tbl_product')->where('price','<=',$re->pto)->where('name','like','%'.$re->key.'%')->orderby('price','asc')->paginate(5);
        //      }
        //      elseif($re->key== null)
           //   {
           //       $result= DB::table('tbl_product')->where('price','<=',$re->pto)->orderby('price','asc')->get();
           //   }
           //   else
        //      {
        //          $result= DB::table('tbl_product')->where('name','like','%'.$re->key.'%')->orderby('price','asc')->paginate(5);
        //      }
            
        //  }
        //  if($re->pto ==null)
        //  {
        //      if($re->key!=null && $re->pto !=null)
        //      {
        //          $result= DB::table('tbl_product')->where('price','>=',$re->pfrom)->where('name','like','%'.$re->key.'%')->orderby('price','asc')->paginate(5);
        //      }
        //      elseif($re->key== null)
           //   {
           //       $result= DB::table('tbl_product')->where('price','>=',$re->pfrom)->orderby('price','asc')->paginate(5);
           //   }
           //   else
        //      {
        //          $result= DB::table('tbl_product')->where('name','like','%'.$re->key.'%')->orderby('price','asc')->paginate(5);
        //      }
        //  }
        // }    
        // 
        return view('pages.home')->with('product',$result);
    }


}