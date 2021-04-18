@extends('layout')
@section('content')
@foreach($details as $key =>$value)
<div class="product-details"><!--product-details-->
<div class="col-sm-3">
	<div class="view-product">
		<img src="{{URL::to('public\uploads\product/'.$value->image)}}" alt="" />
		<h3>ZOOM</h3>
	</div>
</div>
<div class="col-sm-7">
	<div class="product-information"><!--/product-information-->
	<img src="images/product-details/new.jpg" class="newarrival" alt="" />
	<h1>{{($value->name)}}</h1>
	<p>Size : {{($value->size)}}</p>
	<img src="images/product-details/rating.png" alt="" />
	<form action="{{URL::to('/save-cart')}}" method="post">
		{{ csrf_field() }}
	<span>
		<span>{{number_format($value->price).' '.'VNĐ'}}</span>
		<label>Số lượng:</label>
		<input name="qty" type="number" min="1" value="1" />
		<input name="id_hidden" type="hidden" value="{{($value->id)}}" />
		<button type="submit" class="btn btn-fefault cart">
		<i class="fa fa-shopping-cart"></i>
		Thêm vào giỏ hàng
		</button>
	</span>
	</form>
	<h2>{{($value->details)}}</h2>
	
	<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
	</div><!--/product-information-->
</div>
</div><!--/product-details-->
@endforeach


<div class="recommended_items"><!--recommended_items-->
<h2 class="title text-center">Sản phẩm liên quan</h2>
<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<div class="item active">
			@foreach($product as $key=>$value)
			 <a href="{{URL::to('/chi-tiet/'.$value->id)}}">
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('public\uploads\product/'.$value->image)}}" alt="" />
							<h2>{{number_format($value->price).' '.'VNĐ'}}</h2>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
						</div>
					</div>
				</div>
			</div>
		</a>
			@endforeach
		</div>
		<div class="item">
			@foreach($product1 as $key=>$value)
			 <a href="{{URL::to('/chi-tiet/'.$value->id)}}">
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img src="{{URL::to('public\uploads\product/'.$value->image)}}" alt="" />
							<h2>{{number_format($value->price).' '.'VNĐ'}}</h2>
							<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
						</div>
					</div>
				</div>
			</div>
		</a>
			@endforeach
		</div>
	</div>
	
	<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
		<i class="fa fa-angle-left"></i>
	</a>
	<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
		<i class="fa fa-angle-right"></i>
	</a>
</div>
</div><!--/recommended_items-->

@endsection