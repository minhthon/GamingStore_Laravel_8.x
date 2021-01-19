<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Area</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{!! asset('api/fontawesome/css/all.css') !!}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{!! asset('admin/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/css/style2.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/css/popup_create.css') !!}">    
    <script src="{!! asset('admin/ckeditor/ckeditor.js') !!}"></script>
    
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
    
  </body>
</html>
<script src="{!! asset('admin/js/upload.min.js') !!}"></script>    
<script src="{!! asset('admin/js/jquery.min.js') !!}"></script>
<script src="{!! asset('admin/js/popper.js') !!}"></script>
<script src="{!! asset('admin/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('admin/js/main.js') !!}"></script>

