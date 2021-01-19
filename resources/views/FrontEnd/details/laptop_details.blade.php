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
                                    <img src="{{asset('product/'. $laptop->image)}}" width="500" height="300" />
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                            <div class="product-info-main">
                                <div class="page-title">
                                    <h1>{{$laptop->name}}</h1>
                                </div>
                                <div class="product-info-stock-sku">
                                    <span>Bảo hành: {{$des->warranty_period}}</span>
                                    <div class="product-attribute">
                                    <span>Xuất xứ: {{$des->origin}}</span>                                     
                                    </div>
                                </div>
                               
                                <div class="product-info-price">
                                    <div class="price-final">
                                        <span> {{ number_format($laptop->price) }} VND</span>
                                       
                                    </div>
                                </div>
                                <div class="product-add-form">
                                    <form action="#">                                        
                                        <a href="add-to-cart/<?php echo $laptop->id?>" >Thêm vào giỏ hàng</a>
                                    </form>
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
                            <p>{{$laptop->name}}</p>
                                <ul>
                                    <li><i class="fa fa-circle"></i>CPU : {{$des->cpu}}.</li>
                                    <li><i class="fa fa-circle"></i>RAM : {{$des->ram}}.</li>
                                    <li><i class="fa fa-circle"></i>VGA : {{$des->vga}}.</li>
                                    <li><i class="fa fa-circle"></i>Ổ đĩa : {{$des->hard_drive}}.</li>
                                    <li><i class="fa fa-circle"></i>Màn hình : {{$des->display}}.</li>
                                    <li><i class="fa fa-circle"></i>Cổng kết nối : {{$des->connector}}.</li>
                                    <li><i class="fa fa-circle"></i>Âm thanh : {{$des->audio}}.</li>
                                    <li><i class="fa fa-circle"></i>Wifi : {{$des->wifi}}.</li>
                                    <li><i class="fa fa-circle"></i>Bluetooth : {{$des->bluetooth}}.</li>
                                    <li><i class="fa fa-circle"></i>Hệ điều hành : {{$des->operating_system}}.</li>
                                    <li><i class="fa fa-circle"></i>Pin : {{$des->battery}}.</li>
                                    <li><i class="fa fa-circle"></i>Cân nặng : {{$des->weight}}.</li>
                                    <li><i class="fa fa-circle"></i>Màu sắc : {{$des->color}}.</li>
                                    <li><i class="fa fa-circle"></i>Kích thước : {{$des->size}}.</li>
                                    <li><i class="fa fa-circle"></i>Loại : {{$laptop->classify}}.</li>

                                   
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
                        <?php for($i=0; $i<3;$i++){ ?>   
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="#">
                                <img src="{{asset('product/'. $laptop1[$i]->image)}}"  />
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
                                <h4><a href="<?php echo $laptop1[$i]->id;?>">{{ $laptop1[$i]->name }}</a></h4>
                                <div class="product-price">
                                    <ul>
                                    <li> <p><strong>Price: </strong> {{ number_format($laptop1[$i]->price) }} VND </p></li>
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
                        <?php for($i=0; $i<3;$i++){ ?>   
                            <div class="product-total-2">
                                <div class="single-most-product bd mb-18">
                                    <div class="most-product-img">
                                    <img src="{{asset('product/'. $laptop1[$i]->image)}}"  />
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
                                        <h4><a href="<?php echo $laptop1[$i]->id;?>">{{ $laptop1[$i]->name }}</a></h4>
                                        <div class="product-price">
                                            <ul>
                                            <li> <p><strong>Price: </strong> {{ number_format($laptop1[$i]->price) }} VND </p></li>
                                               
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