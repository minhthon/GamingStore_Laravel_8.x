<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gaming - Store</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="user/img/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="user/css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('api/fontawesome/css/all.css') !!}">
    <!-- animate css -->
    <link rel="stylesheet" href="user/css/animate.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="user/css/meanmenu.min.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="user/css/owl.carousel.css">
    <!-- font-awesome css -->
    <!-- flexslider.css-->
    <link rel="stylesheet" href="user/css/flexslider.css">
    <!-- chosen.min.css-->
    <link rel="stylesheet" href="user/css/chosen.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="user/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="user/css/responsive.css">
    <!-- modernizr css -->
    <script src="user/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
  
    <script src="{!! asset('admin/ckeditor/ckeditor.js') !!}"></script>
</head>

<body>
<div class="wrapper d-flex align-items-stretch">
        @include('FrontEnd.theme.sidebar')	
        <div id="content">
                @include('FrontEnd.theme.nav')
                @if(Session::has('message'))
                <div class="alert alert-success">
                  {{ Session::get('message') }}
                </div>
                @endif               	   
                    
        @yield('content')
        </div>
	</div>

    <footer>
    <!-- footer-top-start -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-top-menu bb-2">
                        <nav>
                            <ul>
                                <li><a href="#">Trang chủ</a></li>
                                <li><a href="#">Bật Cookies</a></li>
                                <li><a href="#">Chính sách về quyền riêng tư và cookie</a></li>
                                <li><a href="#">Liên hệ chúng tôi</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-top-start -->
    <!-- footer-mid-start -->
    
    <!-- footer-mid-end -->
    <!-- footer-bottom-start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row bt-2">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="copy-right-area">
                        <p>Copyright ©<a href="#">Koparion</a>. All Right Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="payment-img text-right">
                        <a href="#"><img src="user/img/1.png" alt="payment" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom-end -->
</footer>
<!-- footer-area-end -->
<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="modal-tab">
                            <div class="product-details-large tab-content">
                                <div class="tab-pane active" id="image-1">
                                    <img src="user/img/product/quickview-l4.jpg" alt="" />
                                </div>
                                <div class="tab-pane" id="image-2">
                                    <img src="user/img/product/quickview-l2.jpg" alt="" />
                                </div>
                                <div class="tab-pane" id="image-3">
                                    <img src="user/img/product/quickview-l3.jpg" alt="" />
                                </div>
                                <div class="tab-pane" id="image-4">
                                    <img src="user/img/product/quickview-l5.jpg" alt="" />
                                </div>
                            </div>
                            <div class="product-details-small quickview-active owl-carousel">
                                <a class="active" href="#image-1"><img src="user/img/product/quickview-s4.jpg" alt="" /></a>
                                <a href="#image-2"><img src="user/img/product/quickview-s2.jpg" alt="" /></a>
                                <a href="#image-3"><img src="user/img/product/quickview-s3.jpg" alt="" /></a>
                                <a href="#image-4"><img src="user/img/product/quickview-s5.jpg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="modal-pro-content">
                            <h3>Chaz Kangeroo Hoodie3</h3>
                            <div class="price">
                                <span>$70.00</span>
                            </div>
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet.</p>
                            <div class="quick-view-select">
                                <div class="select-option-part">
                                    <label>Size*</label>
                                    <select class="select">
                                        <option value="">S</option>
                                        <option value="">M</option>
                                        <option value="">L</option>
                                    </select>
                                </div>
                                <div class="quickview-color-wrap">
                                    <label>Color*</label>
                                    <div class="quickview-color">
                                        <ul>
                                            <li class="blue">b</li>
                                            <li class="red">r</li>
                                            <li class="pink">p</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <form action="#">
                                <input type="number" value="1" />
                                <button>Thêm vào giỏ hàng</button>
                            </form>
                            <span>
                                <i class="fa fa-check"></i>
                                Trong kho
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal end -->
<!-- all js here -->
<script src="{!! asset('admin/js/upload.min.js') !!}"></script>    

<!-- jquery latest version -->
<script src="user/js/vendor/jquery-1.12.0.min.js"></script>
<!-- bootstrap js -->
<script src="user/js/bootstrap.min.js"></script>
<!-- owl.carousel js -->
<script src="user/js/owl.carousel.min.js"></script>
<!-- meanmenu js -->
<script src="user/js/jquery.meanmenu.js"></script>
<!-- wow js -->
<script src="user/js/wow.min.js"></script>
<!-- jquery.parallax-1.1.3.js -->
<script src="user/js/jquery.parallax-1.1.3.js"></script>
<!-- jquery.countdown.min.js -->
<script src="user/js/jquery.countdown.min.js"></script>
<!-- jquery.flexslider.js -->
<script src="user/js/jquery.flexslider.js"></script>
<!-- chosen.jquery.min.js -->
<script src="user/js/chosen.jquery.min.js"></script>
<!-- jquery.counterup.min.js -->
<script src="user/js/jquery.counterup.min.js"></script>
<!-- waypoints.min.js -->
<script src="user/js/waypoints.min.js"></script>
<!-- plugins js -->
<script src="user/js/plugins.js"></script>
<!-- main js -->
<script src="user/js/main.js"></script>
@yield('scripts')
</body>
</html>