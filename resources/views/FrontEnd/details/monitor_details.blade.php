@extends('FrontEnd.layout')
@section('title','shop')
@section('content')
<!-- breadcrumbs-area-start -->

<!-- breadcrumbs-area-end -->
<!-- product-main-area-start -->
<br>
<div class="product-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <!-- product-main-area-start -->
                <div class="product-main-area">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li data-thumb="user/img/thum-2/1.jpg">
                                    <img src="{{asset('product/'. $monitor->image)}}" width="500" height="300" />
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                            <div class="product-info-main">
                                <div class="page-title">
                                    <h1>{{$monitor->name}}</h1>
                                </div>
                                <div class="product-info-stock-sku">
                                    <span>Bảo hành: {{$monitor->warranty_period}}</span>
                                    <div class="product-attribute">
                                    <span>Xuất xứ: {{$monitor->origin}}</span>                                     
                                    </div>
                                </div>
                               
                                <div class="product-info-price">
                                    <div class="price-final">
                                        <span> {{ number_format($monitor->price) }} VND</span>
                                       
                                    </div>
                                </div>
                                <div class="product-add-form">
                                    <form action="#">
                                        <div class="quality-button">
                                            <input class="qty" type="number" value="1">
                                        </div>
                                        <a href="#">Thêm vào giỏ hàng</a>
                                    </form>
                                </div>
                                <div class="product-social-links">
                                    <div class="product-addto-links">
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-pie-chart"></i></a>
                                        <a href="#"><i class="fa fa-envelope-o"></i></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product-main-area-end -->
                <!-- product-info-area-start -->
                <div class="product-info-area mt-80">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#Details" data-toggle="tab">Chi tiết</a></li>
                        <li><a href="#Reviews" data-toggle="tab">Đánh giá</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="Details">
                            <div class="valu">
                            <p>{{$monitor->name}}</p>
                                <ul>
                                  
                                    <li><i class="fa fa-circle"></i>Xuất xứ : {{$des->origin}}.</li>
                                    <li><i class="fa fa-circle"></i>Bảo hành : {{$des->warranty_period}}.</li>
                                    <li><i class="fa fa-circle"></i>Hảng sản xuất : {{$des->model}}.</li>
                                    <li><i class="fa fa-circle"></i>Độ phân giải : {{$des->resoluton}}.</li>
                                    <li><i class="fa fa-circle"></i>Độ cong màn hình : {{$des->screen_curvature}}.</li>
                                    <li><i class="fa fa-circle"></i>Độ sáng : {{$des->brightness}}.</li>
                                    <li><i class="fa fa-circle"></i>Độ tương phản : {{$des->contrast_ratio_static}}.</li>
                                    <li><i class="fa fa-circle"></i>Thời gian phản hồi : {{$des->response_time}}.</li>
                                                                       
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="tab-pane" id="Reviews">
                            <div class="valu valu-2">
                              
                                <ul>
                                <div class="form-group">
                               
                                    <textarea  class="form-control" rows="20" id="contents" name="content" >{{$des->content}} </textarea>
                                    <script>CKEDITOR.replace('contents');
                                    
                                    </script>
                                 </div>                             
                                </ul>                           
                               
                            </div>
                        </div>
                <!-- product-info-area-end -->
                <!-- new-book-area-start -->
                <div class="new-book-area mt-60">
                    <div class="section-title text-center mb-30">
                        <h3>Các sản phẩm liên quan</h3>
                    </div>
                    <div class="tab-active-2 owl-carousel">
                        <!-- single-product-start -->
                        <?php for($i=0;( $i<count($monitor1)&& $i<8);$i++){ ?>   
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="#">
                                <img style="height:200px;" src="{{asset('product/'. $monitor1[$i]->image)}}"  />
                                </a>
                                <div class="quick-view">
                                    <a class="action-view" href="#" data-target="#productModal" data-toggle="modal" title="Quick View">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                </div>
                                <div class="product-flag">
                                    <ul>
                                        <li><span class="sale">new</span></li>
                                        <li><span class="discount-percentage">-5%</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <div class="product-rating">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h4><a href="<?php echo $monitor1[$i]->id;?>">{{ $monitor1[$i]->name }}</a></h4>
                                <div class="product-price">
                                    <ul>
                                    <li> <p><strong>Price: </strong> {{ number_format($monitor1[$i]->price) }} VND </p></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-link">
                                <div class="product-button">
                                    <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="add-to-link">
                                    <ul>
                                        <li><a class="active" asp-controller="ProductDetails" asp-action="Index"  title="Details"><i class="fa fa-external-link"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } ?>   
                        <!-- single-product-end -->
                      
                        <!-- single-product-end -->
                    </div>
                </div>
                <!-- new-book-area-start -->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="shop-left">
                    <div class="left-title mb-20">
                        <h4>Related Products</h4>
                    </div>
                    <div class="random-area mb-30">
                  
                        <div class="product-active-2 owl-carousel">
                        <?php for($i=0;( $i<count($monitor1)&& $i<8);$i++){ ?>   
                            <div class="product-total-2">
                                <div class="single-most-product bd mb-18">
                                    <div class="most-product-img">
                                    <img src="{{asset('product/'. $monitor1[$i]->image)}}"  />
                                    </div>
                                    <div class="most-product-content">
                                        <div class="product-rating">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h4><a href="<?php echo $monitor1[$i]->id;?>">{{ $monitor1[$i]->name }}</a></h4>
                                        <div class="product-price">
                                            <ul>
                                            <li> <p><strong>Price: </strong> {{ number_format($monitor1[$i]->price) }} VND </p></li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>   
                         
                                
                            </div>
                           
                              
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>   
</div> 
@stop