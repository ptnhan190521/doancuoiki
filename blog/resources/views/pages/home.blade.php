@extends('layout')
@section('content')
<div id="body">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 padding-right">
                <div class="features_items"><!--features_items-->
                <h2 class="title text-center">Sản phẩm mới nhất</h2>
                @foreach($product as $key => $value)
                <a href="{{URL::to('/chi-tiet/'.$value->id)}}">
                    <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public\uploads\product/'.$value->image)}}" alt="" />
                                <h2>{{number_format($value->price).' '.'VNĐ'}}</h2>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                </a>
                
                @endforeach
                </div><!--features_items-->  
                {{ $product->links() }}
            </div>
        </div>
    </div>
    @endsection