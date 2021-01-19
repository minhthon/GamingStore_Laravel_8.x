@extends('FrontEnd.layout')
@section('title', 'laptop')
@section('content')

<!-- banner-area-start -->
<div class="banner-area banner-res-large ptb-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="single-banner">
                    <div class="banner-img">
                        <a href="#"><img src="user/img/banner/1.png" alt="banner" /></a>
                    </div>
                    <div class="banner-text">
                        <h4>Miễn phí vận chuyển</h4>
                        <p>
                            Đối với tất cả các đơn đặt hàng trên 500.000 đ
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                <div class="single-banner">
                    <div class="banner-img">
                        <a href="#"><img src="user/img/banner/2.png" alt="banner" /></a>
                    </div>
                    <div class="banner-text">
                        <h4>Đảm bảo hoàn tiền</h4>
                        <p>Đảm bảo hoàn tiền 100%</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 hidden-sm col-xs-12">
                <div class="single-banner">
                    <div class="banner-img">
                        <a href="#"><img src="user/img/banner/3.png" alt="banner" /></a>
                    </div>
                    <div class="banner-text">
                        <h4>Thanh toán</h4>
                        <p>Thanh toán khi giao hàng</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                <div class="single-banner mrg-none-xs">
                    <div class="banner-img">
                        <a href="#"><img src="user/img/banner/4.png" alt="banner" /></a>
                    </div>
                    <div class="banner-text">
                        <h4>Trợ giúp & Hỗ trợ</h4>
                        <p>Gọi: + 0123.4567.89</p>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
<!-- banner-area-end -->
<!-- slider-area-start -->
<div class="slider-area">
    <div class="slider-active owl-carousel">
        <div class="single-slider pt-125 pb-130 bg-img" style=" background-image: url(user/img/slider/SlideLaptop.png);">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="slider-content slider-animated-1 text-center">
                            <h1>Laptop Sale</h1>
                            <h2>RogTrix</h2>
                            <h3>Bắt đầu từ 50.000.000 VND</h3>
                            <a href="#">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-h1-2 pt-215 pb-130 bg-img" style=" background-image: url(user/img/slider/SlidePC.png);">
            <div class="container">
                <div class="slider-content slider-content-2 slider-animated-1">
                    <h1>Xin Chào</h1><br>
                    <h2></h2>
                    <h3>
                        Chúng tôi có thể giúp bạn
                    </h3>
                  
                    <a href="#">
                        Liên hệ với chúng tôi ngay!
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider-area-end -->
<!-- product-area-start -->
<div class="product-area pt-95 xs-mb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center mb-50">
                    <h2>
                       Sản phẩm mới nhất
                    </h2>
                    <p>
                        Duyệt qua bộ sưu tập các sản phẩm mới nhất và hàng đầu của chúng tôi.<br /> 
                    </p>
                </div>
            </div>
            <div class="col-lg-12">
                <!-- tab-menu-start -->
                <div class="tab-menu mb-40 text-center">
                    <ul>
                        <li class="active"><a href="#Audiobooks" data-toggle="tab">Laptop</a></li>
                        <li><a href="#books" data-toggle="tab">PC</a></li>
                        <li><a href="#bussiness" data-toggle="tab">Màn hình</a></li>
                    </ul>
                </div>
                <!-- tab-menu-end -->
            </div>
        </div>
        <!-- tab-area-start -->
        
        <div class="tab-content">
					<div class="tab-pane active" id="Audiobooks">
                        <div class="tab-active owl-carousel">
                            <!-- single-product-start -->
                            <?php for($i=0; $i<5 && $i<count($laptop) ;$i++){ ?>   
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                    <img  style="height:200px;"  src="{{asset('product/'. $laptop[$i]->image)}}" class="primary"  />
                                    </a>
                                 
                                    <div class="product-flag">
                                        <ul>
                                            <li><span class="sale">new</span></li>
                                            <li><span class="discount-percentage">-5%</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                  
                                    <h4><a href="<?php echo $laptop[$i]->id;?>">{{ $laptop[$i]->name }}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                        <li> <p><strong>Price: </strong> {{ number_format($laptop[$i]->price) }} VND </p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a href="add-to-cart/<?php echo $laptop[$i]->id?>"  title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>	
                            </div>
                            <?php } ?>   
                            <!-- single-product-end -->                           
                        </div>
					</div>
					<div class="tab-pane fade" id="books">
                        <div class="tab-active owl-carousel">
                            <!-- single-product-start -->
                            <?php for($i=0; $i<5 && $i<count($pc) ;$i++){ ?>   
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                    <img style="height:200px;" src="{{asset('product/'. $pc[$i]->image)}}" class="primary" />
                                    </a>
                                 
                                    <div class="product-flag">
                                        <ul>
                                            <li><span class="sale">new</span></li>
                                            <li><span class="discount-percentage">-5%</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                   
                                    <h4><a href="<?php echo $pc[$i]->id;?>">{{ $pc[$i]->name }}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                        <li> <p><strong>Price: </strong> {{ number_format($pc[$i]->price) }} VND </p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a href="add-to-cart/<?php echo $pc[$i]->id?>"  title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>	
                            </div>
                            <?php } ?>   
                            <!-- single-product-end -->
                            <!-- single-product-end -->
                            
                            <!-- single-product-end -->
                        </div>
					</div>
					<div class="tab-pane fade" id="bussiness">
                        <div class="tab-active owl-carousel">
                            <!-- single-product-start -->
                            <?php for($i=0; $i<5 && $i<count($monitor) ;$i++){ ?>   
                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                    <img style="height:200px;" src="{{asset('product/'. $monitor[$i]->image)}}" class="primary" />
                                    </a>
                                 
                                    <div class="product-flag">
                                        <ul>
                                            <li><span class="sale">new</span></li>
                                            <li><span class="discount-percentage">-5%</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                   
                                    <h4><a href="<?php echo $monitor[$i]->id;?>">{{ $monitor[$i]->name }}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                        <li> <p><strong>Price: </strong> {{ number_format($monitor[$i]->price) }} VND </p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a href="add-to-cart/<?php echo $monitor[$i]->id?>"  title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>	
                            </div>
                            <?php } ?>   
                            <!-- single-product-end -->
                        </div>
					</div>
				</div>
<!-- product-area-end -->
<!-- banner-area-start -->
<div class="banner-area-5 mtb-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-img-2">
                    <a href="#"><img src="user/img/banner/5.jpg" alt="banner" /></a>
                    <div class="banner-text">
                        <h3>G. Meyer Books & Spiritual Traveler Press</h3>
                        <h2>Sale up to 30% off</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner-area-end -->
<!-- bestseller-area-start -->

<!-- new-book-area-start -->
<div class="new-book-area pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title bt text-center pt-100 mb-30 section-title-res">
                    <h2>PC - Màn hình</h2>
                </div>
            </div>
        </div>
        <div class="tab-active owl-carousel">
          <?php for ($i=0;$i<5;$i++){?>
            <div class="tab-total">
                <!-- single-product-start -->
                <div class="product-wrapper mb-40">
                <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="#">
                                    <img style="height:200px;" src="{{asset('product/'. $monitor[$i]->image)}}" class="primary" />
                                    </a>
                                 
                                    <div class="product-flag">
                                        <ul>
                                            <li><span class="sale">new</span></li>
                                            <li><span class="discount-percentage">-5%</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                   
                                    <h4><a href="<?php echo $monitor[$i]->id;?>">{{ $monitor[$i]->name }}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                        <li> <p><strong>Price: </strong> {{ number_format($monitor[$i]->price) }} VND </p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a href="add-to-cart/<?php echo $monitor[$i]->id?>"  title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>	
                            </div>
                </div>
                <!-- single-product-end -->
                <!-- single-product-start -->
                <div class="product-wrapper">
                <div class="product-img">
                                    <a href="#">
                                    <img style="height:200px;" src="{{asset('product/'. $pc[$i]->image)}}" class="primary" />
                                    </a>
                                 
                                    <div class="product-flag">
                                        <ul>
                                            <li><span class="sale">new</span></li>
                                            <li><span class="discount-percentage">-5%</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-details text-center">
                                   
                                    <h4><a href="<?php echo $pc[$i]->id;?>">{{ $pc[$i]->name }}</a></h4>
                                    <div class="product-price">
                                        <ul>
                                        <li> <p><strong>Price: </strong> {{ number_format($pc[$i]->price) }} VND </p></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-link">
                                    <div class="product-button">
                                        <a href="add-to-cart/<?php echo $pc[$i]->id?>"  title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="add-to-link">
                                        <ul>
                                            <li><a href="product-details.html" title="Details"><i class="fa fa-external-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>	
                </div>
                <!-- single-product-end -->
            </div>
            <?php }?>
        </div>
    </div>
</div>


<!-- most-product-area-end -->
<!-- testimonial-area-start -->
<div class="testimonial-area ptb-100 bg">
    <div class="container">
        <div class="row">
            <div class="testimonial-active owl-carousel">
                <div class="col-lg-12">
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <a href="#"><i class="fa fa-quote-right"></i></a>
                        </div>
                        <div class="testimonial-text">
                            <p>Tôi rất hài lòng với tất cả các chủ đề, sự hỗ trợ tuyệt vời, không thể mong muốn gì hơn!</p>
                            <a href="#">Sandy Wilcke/user</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-testimonial text-center">
                        <div class="testimonial-img">
                            <a href="#"><i class="fa fa-quote-right"></i></a>
                        </div>
                        <div class="testimonial-text">
                            <p>Tất cả hoàn hảo !! Tôi có ba trang web với magento, chủ đề này là tốt nhất !! Hỗ trợ tuyệt vời, gói cài đặt chủ đề tư vấn</p>
                            <a href="#">Sandy Wilcke/user</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial-area-end -->
<!-- recent-post-area-start -->

<!-- recent-post-area-end -->
<!-- social-group-area-start -->

@stop