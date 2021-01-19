@extends('FrontEnd.layout')

@section('title', 'laptop')

@section('content')
    <?php //unset(session('cart')) ?>
    <div class="container laptops">

        <div class="row">

            @foreach($laptop as $laptop)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{asset('images/'. $laptop->image)}}" width="500" height="300" />
                        <div class="caption">
                            <h4>{{ $laptop->name }}</h4>
                            <p>{{ strtolower($laptop->description) }}</p>
                            <p><strong>Price: </strong> {{ number_format($laptop->price) }} đ</p>
                            <p class="btn-holder"><a href="{{ url('laptop/add-to-cart/'.$laptop->id) }}" class="btn btn-warning btn-block text-center" role="button">Thêm vào giỏ hàng</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- End row -->

    </div>

@endsection