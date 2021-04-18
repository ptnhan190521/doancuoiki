@extends('admin.layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật sản phẩm
                        </header>
                         <?php 
                                    $message=Session::get('message');
                                    if ($message) {
                                        echo '<span class="text-alert">'.$message.'</span>';
                                        Session::put('message',null);
                                    }
                             ?>
                        <div class="panel-body">
                           @foreach($edit_product as $key=>$edit_value)
                            <div class="position-center">
                                <form role="form"  action="{{URL::to('/update-product/'.$edit_value->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control"  value="{{$edit_value->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="text" name="price" class="form-control" value="{{$edit_value->price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình</label>
                                    <input type="file"name="image" value="{{$edit_value->image}}">
                                    <img src="{{URL::to('public\uploads\product/'.$edit_value->image)}}" alt="" height="100" width="100">
                                </div>
                                
                                 <div class="form-group">
                                    <label for="exampleInputFile">Size</label>
                                    <select  name="size" class="form-control input-lg m-bot15" > 
                                        <option >{{$edit_value->size}}</option>
                                        <option >S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                        <option>XXL</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chi tiết sản phẩm</label>
                                   <textarea style="resize: none" rows="5" name="details" class="form-control" >{{$edit_value->details}}</textarea> 
                                </div>

                                
                                <button type="submit" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
            
        </div>
@endsection