<header id="header">
    <!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +0123456789</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.blade.php"><img src="{{('public/frontend/img/logo.png')}}" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Vi???t Nam</a></li>
                                    <li><a href="#">USA</a></li>
                                </ul>
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">VN??</a></li>
                                    <li><a href="#">Dollar</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li>
                                     @if(Session::has('khEmail')!=null)
                                      <li ><a href="#" style="font-weight: bold;color:red;font-size: 18px"><i class="fa fa-crosshairs" ></i>
                                       {{ Session::get('khName') }}
                                      </a></li>
                                     @endif
                                  
                                </li>
                                <li><a href="#"><i class="fa fa-star"></i> ????nh gi??</a></li>
                                 
                                <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Gi??? h??ng</a></li>
                               
                                    @if(Session::has('khEmail')!=null)
                                     <li>
                                     <a href="{{url('logout')}}"><i class="fa fa-lock"></i>????ng xu???t</a>
                                 </li>
                                    @else
                                    <li> <a href="{{url('login')}}"><i class="fa fa-lock"></i>????ng nh???p</a></li>
                                    <li> <a href="{{url('register')}}"><i class="fa fa-unlock"></i>????ng k??</a></li>
                                    @endif
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{route('trang-chu')}}" class="active">Trang ch???</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">S???n Ph???m</a></li>
                                        <li><a href="checkout.html">Tho??t</a></li>
                                        <li><a href="cart.html">Gi??? h??ng</a></li>
                                        <li><a href="login.html">????ng nh???p</a></li>
                                    </ul>
                                </li> 
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                   
                        <div class="search_box pull-right">
                            <form action="{{URL::to('search')}}" method="post" accept-charset="utf-8">{{csrf_field()}}
                                <div class="col">
                                    <div class="row-1">
                                        <input type="text" name="key"  style="width:100%;" placeholder="T??m ki???m s???n ph???m"/>
                                    </div>
                                    <div class="row-1">
                                           <select class="form-control-static" name="price">
                                    <option value="0">100,000VND - 150,000VND</option>
                                    <option value="1">150,000VND - 200,000VND</option>
                                    <option value="2">200,000VND - 250,000VND</option>
                                    <option value="3">250,000VND - 300,000VND</option>
                                </select>
                                    </div>
                                    <div class="row-1" style="width: 100%">
                                            <button type="submit" class="btn btn-outline-warning"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                               
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
   </header>