@extends('admin.laptop.layout')
@section('content')

@csrf
<div class="container">
<a href="{{route("pc.index")}}" class="btn btn-outline-primary btn-block ">Trở về danh sách PC</a>
    <table class="table  table-bordered">
        <thead>
            <tr>
            <th scope="col" style="color:#f8b379">#</th>
            <th scope="col" style="color:#f8b379; text-align:center;">#</th>
            <th scope="col" style="color:#f8b379; text-align:center;">Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" style="color:#f8b379 ">1</th>
                <td><p class="p-edit">Tên product</p></td>
                <td><p class="p-edit">{{$product->name}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">2</th>
                <td><p class="p-edit">Giá bán</p></td>
                <td><p class="p-edit">{{$product->price}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">3</th>
                <td><p class="p-edit">Số lượng</p></td>
                <td><p class="p-edit">{{$des->quantity}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">4</th>
                <td><p class="p-edit">Nguồn gốc</p></td>
                <td><p class="p-edit">{{$des->origin}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">5</th>
                <td><p class="p-edit">Hình ảnh</p></td>
              <td> <img src="{{asset('product'. $product->image)}}" width="320px" height="240px" /></td> 
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">6</th>
                <td><p class="p-edit">Thời gian bảo hành</p></td>
                <td><p class="p-edit">{{$des->warranty_period}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">7</th>
                <td><p class="p-edit">Mainboard</p></td>
                <td><p class="p-edit">{{$des->mainboard}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">7</th>
                <td><p class="p-edit">CPU-Chip xử lý</p></td>
                <td><p class="p-edit">{{$des->cpu}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">8</th>
                <td><p class="p-edit">Ram-Bộ nhớ đệm</p></td>
                <td><p class="p-edit">{{$des->ram}}</p></td>
            </tr>

            <tr>
                <th scope="row" style="color:#f8b379 ">9</th>
                <td><p class="p-edit">VGA-Card đồ họa</p></td>
                <td><p class="p-edit">{{$des->vga}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">10</th>
                <td><p class="p-edit">HDD</p></td>
                <td><p class="p-edit">{{$des->hdd}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">11</th>
                <td><p class="p-edit">SSD</p></td>
                <td><p class="p-edit">{{$des->ssd}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">12</th>
                <td><p class="p-edit">Case - Vỏ máy tính</p></td>
                <td><p class="p-edit">{{$des->case}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">13</th>
                <td><p class="p-edit">Tản nhiệt</p></td>
                <td><p class="p-edit">{{$des->cooling}}</p></td>
            </tr>
            
            <tr>
                <th scope="row" style="color:#f8b379 ">21</th>
                <td><p class="p-edit">Phân loại</p></td>
                <td><p class="p-edit">{{$des->classify}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">22</th>
                <td><p class="p-edit">Mô tả</p></td>
                <td><p class="p-edit">{{$des->content}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">23</th>
                <td><p class="p-edit">Mã danh mục</p></td>
                <td><p class="p-edit">{{$product->idCategory}}</p></td>
            </tr>
        </tbody>       
    </table>
    </div>
@stop