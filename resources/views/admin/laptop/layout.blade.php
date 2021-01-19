<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Area</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{!! asset('api/fontawesome/css/all.css') !!}">
  <link rel="stylesheet" href="{!! asset('admin/css/style.css') !!}">
  <link rel="stylesheet" href="{!! asset('admin/css/style2.css') !!}">
  <link rel="stylesheet" href="{!! asset('admin/css/popup_create.css') !!}">  
  <!-- <script src="{!! asset('admin/ckeditor/ckeditor.js') !!}"></script> -->
  <script src="{!! asset('admin/ckeditor/ckeditor.js') !!}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

  </head>
  <body>
	<div class="wrapper d-flex align-items-stretch">
        @include('admin.theme.sidebar')	
        <div id="content">
                @include('admin.theme.nav')
                @if(Session::has('message'))
                <div class="alert alert-success">
                  {{ Session::get('message') }}
                </div>
                @endif                	   
               
     
        @yield('content')
        </div>
	</div>
  <script src="{!! asset('admin/js/upload.min.js') !!}"></script>   
    <!-- <script src="{!! asset('admin/js/jquery.min.js') !!}"></script> -->
    <script src="{!! asset('admin/js/popper.js') !!}"></script>
    <script src="{!! asset('admin/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('admin/js/main.js') !!}"></script>
    <!-- <script>CKEDITOR.replace('contents')</script> -->
  </body>
</html>


