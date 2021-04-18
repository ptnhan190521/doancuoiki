<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;	
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request){
    	$productId=$request->id_hidden;
    	$quantity=$request->qty;

    	$product_info=DB::table('tbl_product')->where('id',$productId)->first();

    	$data['id']=$product_info->id;
    	$data['qty']=$quantity;
    	$data['name']=$product_info->name;
    	$data['price']=$product_info->price;
    	$data['weight']=$product_info->price;
    	$data['options']['image']=$product_info->image;
    	Cart::add($data);
		
    	//Cart::add('293ad', 'Product 1', 1, 9.99);
		//Cart::destroy();
    	return Redirect::to('/show_cart');
    	}
    public function show_cart(){
    		return view('pages.show_cart');
    	}
    public function delete_to_cart($rowId){
    	Cart::update($rowId,0);
    		return Redirect::to('/show_cart');
    	}
    public function update_qty(Request $request){
    	$rowId=$request->rowId_qty;
    	$quantity=$request->cart_quantity;
    	Cart::update($rowId,$quantity);
    		return Redirect::to('/show_cart');
    }
}
