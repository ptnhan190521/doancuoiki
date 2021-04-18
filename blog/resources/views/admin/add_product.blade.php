@extends('admin.layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
                        </header>
                        <div class="panel-body">
                            <?php 
                                    $message=Session::get('message');
                                    if ($message) {
                                        echo '<span  class="text-alert">'.$message.'</span>';
                                        Session::put('message',null);
                                    }
                             ?>
                            <div class="position-center">
                                <form role="form"  action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control"  placeholder="Tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="text" name="price" class="form-control" placeholder="Giá">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hình</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Status</label>
                                    <select  name="status" class="form-control input-lg m-bot15">
                                        <option>0</option>
                                        <option>1</option>
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputFile">Size</label>
                                    <select name="size" class="form-control input-lg m-bot15">
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                        <option>XXL</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chi tiết sản phẩm</label>
                                   <textarea style="resize: none" rows="5" name="details" class="form-control" placeholder="Chi tiết sản phẩm"></textarea> 
                                </div>

                                
                                <button type="submit" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>
@endsection