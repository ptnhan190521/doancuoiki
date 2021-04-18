@extends('layout')
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{('trang-chu')}}">Trang chủ</a></li>
				<li class="active">Giỏ hàng của bạn</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<?php 
			$content=Cart::content();
			 ?>
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Tên sản phẩm</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng tiền</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($content as $value)
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{URL::to('public\uploads\product/'.$value->options->image)}}" width="60"  alt=""></a>
						</td>
						<td class="cart_description">
							<h4>{{($value->name)}}</h4>
							
						</td>
						<td class="cart_price">
							<p>{{number_format($value->price).' '.'VNĐ'}}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
							<form action="{{URL::to('/update-qty')}}" method="post">
								{{ csrf_field() }}
								<input class="cart_quantity_input" type="number" min="0" name="cart_quantity" value="{{($value->qty)}}"  size="2">
								<input type="hidden" value="{{$value->rowId}}" name="rowId_qty" class="form-control">
								<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
							</form>	
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">
								<?php 
								$subtotal = $value->price * $value->qty;
								echo number_format($subtotal).' '.'VNĐ'; 
								 ?>
							</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$value->rowId)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	</section> <!--/#cart_items-->
	@endsection