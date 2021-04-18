<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class Product extends Controller
{
	public function AuthLogin()
    {
      $admin_id=Session::get('admin_id');
      if ($admin_id) {
        return Redirect::to('/dashboard');
      }else{
        return Redirect::to('admin')->send();
      }
    }
     public function add_product()
     {
     	$this->AuthLogin();
     	return view('admin.add_product');
     }

     public function unactive_product($id)
     {
     	$this->AuthLogin();
     	DB::table('tbl_product')->where('id',$id)->update(['status'=>1]);
     	Session::put('message','Không kích hoạt sản phẩm thành công');
     	return Redirect::to('/all-product');
     }
      public function active_product($id)
     {
     	$this->AuthLogin();
     	DB::table('tbl_product')->where('id',$id)->update(['status'=>0]);
     	Session::put('message','Kích hoạt sản phẩm thành công');
     	return Redirect::to('/all-product');
     }

     public function all_product()
     {
     	$this->AuthLogin();
     	$all_product=DB::table('tbl_product')->get();
     	$manager_product=view('admin.all_product')->with('all_product',$all_product);
     	return view('admin.layout')->with('admin.all_product',$manager_product);
     }
     public function save_product(Request $re)
     {
     	$this->AuthLogin();
     	$data=array();
     	$data['name']=$re->name;
     	$data['price']=$re->price;
     	$data['image']=$re->image;
     	$data['status']=$re->status;
     	$data['size']=$re->size;
     	$data['details']=$re->details;
     	$get_image=$re->file('image');
     	if($get_image){
     		$get_name_image=$get_image->getClientOriginalName();
     		$name_image=current(explode('.', $get_name_image));
     		$new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
     		$get_image->move('public\uploads\product',$new_image);
     		$data['image']=$new_image;
     		DB::table('tbl_product')->insert($data);
     		Session::put('message','Thêm sản phẩm thành công');
			return Redirect::to('/all-product');

     	}


     	// echo '<pre>';
     	// print_r($data);
     	// echo '</pre>';

     	DB::table('tbl_product')->insert($data);
     	Session::put('message','Thêm sản phẩm thành công');
		return Redirect::to('/add-product');
     	// return view('admin.all_product');
     }

      public function edit_product($id)
     {
     	$this->AuthLogin();
     	$edit_product=DB::table('tbl_product')->where('id',$id)->get();//lay ra 1 san pham

     	$manager_product=view('admin.edit_product')->with('edit_product',$edit_product);
     	return view('admin.layout')->with('admin.edit_product',$manager_product);
     }
     public function update_product(Request $re,$id)
     {
    	 $this->AuthLogin();	
     	$data=array();
     	$data['name']=$re->name;
     	$data['price']=$re->price;
     	
     	$data['size']=$re->size;
     	$data['details']=$re->details;//lay ra 1 san pham
     	$get_image=$re->file('image');

     	if($get_image){
     		$get_name_image=$get_image->getClientOriginalName();
     		$name_image=current(explode('.', $get_name_image));
     		$new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
     		$get_image->move('public\uploads\product',$new_image);
     		$data['image']=$new_image;
     		DB::table('tbl_product')->where('id',$id)->update($data);
     		Session::put('message','Cập nhật sản phẩm thành công');
			return Redirect::to('/all-product');
		}
     	DB::table('tbl_product')->where('id',$id)->update($data);
     	Session::put('message','Cập nhật sản phẩm thành công');
		return Redirect::to('/all-product');
     }
     public function delete_product($id)
     {
     	$this->AuthLogin();
     	DB::table('tbl_product')->where('id',$id)->delete();
     	Session::put('message','Xóa sản phẩm thành công');
		return Redirect::to('/all-product');
     }
}
