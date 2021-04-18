<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;	
session_start();
class ProductController extends Controller
{
   public function details_product($id){
   	$product=DB::table('tbl_product')->where('status','0')->orderby('price','desc')->limit(3)->get();
   	$product1=DB::table('tbl_product')->where('status','0')->orderby('price','asc')->limit(3)->get();
   	$details=DB::table('tbl_product')->where('tbl_product.id',$id)->get();
    	return view('pages.details_product')->with('details',$details)->with('product',$product)->with('product1',$product1);
    }
}
