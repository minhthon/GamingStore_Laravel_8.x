
    <!-- header-area-start -->
    <header>
       
        <!-- header-mid-area-start -->
        <div class="header-mid-area ptb-40">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                        <div class="logo-area text-center logo-xs-mrg">
                        <a href="index.html"><img src="user/img/logo/logo.png" alt="logo" /></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <!--Bắt đầu giỏ hàng-->
                        <div class="dropdown">
                                <button style="background-color:#f07c29; type="button" class="btn btn-primary" data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart"  aria-hidden="true"></i> Giỏ hàng <span class="badge badge-pill badge-warning">{{ count((array) session('cart')) }}</span>
                                </button>
                                <div class="dropdown-menu">
                                    <div class="row total-header-section">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                        </div>

                                        <?php $total = 0 ?>
                                        @foreach((array) session('cart') as $id => $details)
                                            <?php $total += $details['price'] * $details['quantity'] ?>
                                        @endforeach

                                        <div class="col-lg-10 col-sm-10 col-10 total-section text-right">
                                            <p>Total: <span class="text-info">$ {{number_format( $total) }}</span></p>
                                        </div>
                                    </div>

                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            <div class="row cart-detail">
                                                <div class="col-lg-6 col-sm-6 col-6 cart-detail-img">
                                                    <img src="{{ asset('product/'.$details['image']) }}" />
                                                </div>
                                                <div class="col-lg-6 col-sm-6 col-6 cart-detail-product">
                                                    <p>{{ $details['name'] }}</p>
                                                    <span class="price text-info"> ${{ number_format( $details['price']) }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                            <a href="{{ url('cart') }}" class="btn btn-warning btn-block">View all</a>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <!--Kết thúc giỏ hàng-->
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                      <ul>                           
                            <?php
                            if($user!="")
                            { 
                             ?>
                               <li> <a href="user/<?php echo $user->id ?>"> <img style="border-radius:100px"  class="rounded-circle" src="{{asset('image/user/'.$user->image)}}" width="15" height="15" /> <?php  echo $user->name; ?>  </a></li>
                      
                                <li><a href="userlogout">Đăng xuất</a></li>            
                                <?php  
                            }
                            else{
                                echo'<li><a href="userlogin">Đăng nhập</a><br></li>';
                                echo'<li><a href="register">Đăng kí</a></li>';
                            }
                            ?>
                      
                        </ul>
                   
                    </div> <!--  Kết thúc thẻ div của account -->
            </div>
        </div>
        <!-- header-mid-area-end -->
        <!-- main-menu-area-start -->
        <div class="main-menu-area hidden-sm hidden-xs sticky-header-1" id="header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="menu-area">
                            <nav>
                                <ul>
                                    <li class="active">
                                        <a href="{{asset('/')}}">Home<i></i></a>
                                           
                                    </li>
                                    <li>
                                        <a href="shop">Shop<i class=""></i></a>
                                            
                                    </li>
                                    <li>
                                        <a href="laptop">Laptop<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu">
                                                <span>
                                                    <a href="#" class="title">Các loại Laptop</a>
                                                    <a href="laptopgaming">Laptop Gaming</a>
                                                    <a href="laptopdoanhnhan">Laptop Doanh Nhân</a>
                                                    <a href="laptopvanphong">Laptop Văn Phòng</a>
                                                 
                                                </span>
                                            </div>
                                    </li>
                                    
                                    <li>
                                        <a href="pc">PC<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu">
                                                <span>
                                                    <a href="#" class="title">Các loại PC</a>
                                                    <a href="pctamtrung">PC Văn Phòng</a>
                                                    <a href="pccaocap">PC Workstation</a>
                                                    <a href="pcgaming">PC Gaming </a>
                                                </span>
                                            </div>
                                    </li>

                                    <li>
                                        <a href="monitor">Màn Hình<i class="fa fa-angle-down"></i></a>
                                            <div class="mega-menu">
                                                <span>
                                            
                                                    <a href="manhinhasus">ASUS</a>
                                                    <a href="manhinhdell">DELL</a>
                                                    <a href="manhinhsamsung">SAMSUNG</a>
                                                    <a href="manhinhmsi">MSI</a>
                                                    <a href="monitor">Tất cả màn hình</a>
                                                </span>
                                            </div>
                                    </li>
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-menu-area-end -->
        <!-- mobile-menu-area-start -->
        <div class="mobile-menu-area hidden-md hidden-lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul id="nav">
                                    <li>
                                        <a href="index.html">Home</a>
											<ul>
												<li><a href="#">Home-2</a></li>
												<li><a href="index-3.html">Home-3</a></li>
											</ul>
									</li>
                                        
                                    <li>
                                   

                                    <li>
                                        <a href="product-details.html">Audio books</a>
											<ul>
												<li><a href="shop.html">Short Sleeve</a></li>
												<li><a href="shop.html">Sweaters</a></li>
												<li><a href="shop.html">Hoodies</a></li>
											</ul>
                                    </li>

                                    <li>
                                        <a href="product-details.html">children’s books</a>
											<ul>
												<li><a href="shop.html">Shirts</a></li>
												<li><a href="shop.html">Florals</a></li>
												<li><a href="shop.html">Crochet</a></li>
											</ul>
                                    </li>

                                    <li>
                                        <a href="product-details.html">Page</a>
											<ul>
												<li><a href="shop.html">Shop</a></li>
												<li><a href="product-details.html">product-details</a></li>
												<li><a href="cart.html">Cart</a></li>
												<li><a href="login.html">Login</a></li>
											</ul>
									</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area-end -->
    </header>
    <!-- header-area-end -->
  