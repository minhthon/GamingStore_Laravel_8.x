@extends('FrontEnd.layout')
@section('title','shop')
@section('content')

<div class="shop-main-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="shop-left">
                    <div class="section-title-5 mb-30">
                        <h2>Shopping Options</h2>
                    </div>
                    <div class="left-title mb-20">
                        <h4>Category</h4>
                    </div>
                    <div class="left-menu mb-30">
                        <ul>
                         
                          
                        
                            <li><a href="laptopgaming">Laptop Gaming<span>*</span></a></li>
                            <li><a href="laptopdoanhnhan">Laptop Doanh Nhân<span>*</span></a></li>
                            <li><a href="laptopvanphong">Laptop Văn Phòng<span>*</span></a></li>                           
                        </ul>
                    </div>            
                         
                </div>  
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="category-image mb-30">
                    <a href="#"><img src="user/img/banner/32.jpg" alt="banner" /></a>
                </div>
                <div class="section-title-5 mb-30">
                   
                </div>
                <div class="toolbar mb-30">
                    <div class="shop-tab">
                        <div class="tab-3">
                            <ul>
                                <li class="active"><a href="#th" data-toggle="tab"><i class="fa fa-th-large"></i>Grid</a></li>
                                <li><a href="#list" data-toggle="tab"><i class="fa fa-bars"></i>List</a></li>
                            </ul>
                        </div>
                        <div class="list-page">
                            <p>Items 1-9 of 11</p>
                        </div>
                    </div>
                    <div class="field-limiter">
                        <div class="control">
                            <span>Show</span>
                            <!-- chosen-start -->
                            <select data-placeholder="Default Sorting" style="width:50px;" class="chosen-select" tabindex="1">
                                <option value="Sorting">1</option>
                                <option value="popularity">2</option>
                                <option value="rating">3</option>
                                <option value="date">4</option>
                            </select>
                            <!-- chosen-end -->
                        </div>
                    </div>
                    <div class="toolbar-sorter">
                        <span>Sort By</span>
                        <select id="sorter" class="sorter-options" data-role="sorter">
                            <option selected="selected" value="position"> Position </option>
                            <option value="name"> Product Name </option>
                            <option value="price"> Price </option>
                        </select>
                        <a href="#"><i class="fa fa-arrow-up"></i></a>
                    </div>
                </div>
                <!-- tab-area-start -->
                <div class="tab-content">
                    <div class="tab-pane active" id="th">
                        <div class="row"> 

                            <?php for($i=0; $i<$laptop->count();$i++){ ?>   
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <!-- single-product-start -->
                                    <div class="product-wrapper mb-40">
                                        <div class="product-img">
                                            <a href="#">
                                            <img style="height:150px;" src="{{asset('product/'. $laptop[$i]->image)}}" width="500" height="300" />
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
                                          
                                            <h4><a href="<?php echo $laptop[$i]->id;?>">{{ $laptop[$i]->name }}</a></h4>
                                            <div class="product-price">
                                                <ul>
                                                    <li> <p><strong>Price: </strong> {{ number_format($laptop[$i]->price) }} VND </p></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-link">
                                            <div class="product-button">
                                                <a href="add-to-cart/<?php echo $laptop[$i]->id?>" title="Add to cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- single-product-end -->
                                </div>                               
                            <?php } ?>   
                       
                    </div>
                </div>
                <!-- tab-area-end -->
                <!-- pagination-area-start -->
                <div class="pagination-area mt-50">
                    <div class="list-page-2">
                        <p>Items 1-9 of 11</p>
                    </div>
                    <div class="page-number">
                        <ul>
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#" class="angle"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- pagination-area-end -->
            </div>
        </div>
    </div>
</div>
<!-- shop-main-area-end -->
@stop