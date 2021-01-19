@extends('admin.product.layout')
@section('content')

@csrf
<div class="container">
<a href="{{route("laptop.index")}}" class="btn btn-outline-primary btn-block ">Trở về danh sách laptop</a>
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
              <td> <img src="{{asset('product/'. $product->image)}}" width="320px" height="240px" /></td> 
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">6</th>
                <td><p class="p-edit">Thời gian bảo hành</p></td>
                <td><p class="p-edit">{{$des->warranty_period}}</p></td>
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
                <td><p class="p-edit">Lưu trử</p></td>
                <td><p class="p-edit">{{$des->hard_drive}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">11</th>
                <td><p class="p-edit">Màn hình</p></td>
                <td><p class="p-edit">{{$des->display}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">12</th>
                <td><p class="p-edit">Kết nối</p></td>
                <td><p class="p-edit">{{$des->connector}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">13</th>
                <td><p class="p-edit">Âm thanh</p></td>
                <td><p class="p-edit">{{$des->audio}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">14</th>
                <td><p class="p-edit">Wifi</p></td>
                <td><p class="p-edit">{{$des->wifi}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">15</th>
                <td><p class="p-edit">Bluetooth</p></td>
                <td><p class="p-edit">{{$des->bluetooth}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">16</th>
                <td><p class="p-edit">Hệ điều hành</p></td>
                <td><p class="p-edit">{{$des->operating_system}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">17</th>
                <td><p class="p-edit">Pin</p></td>
                <td><p class="p-edit">{{$des->battery}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">18</th>
                <td><p class="p-edit">Cân nặng</p></td>
                <td><p class="p-edit">{{$des->weight}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">19</th>
                <td><p class="p-edit">Màu sắc</p></td>
                <td><p class="p-edit">{{$des->color}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="color:#f8b379 ">20</th>
                <td><p class="p-edit">Kích thước</p></td>
                <td><p class="p-edit">{{$des->size}}</p></td>
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