@extends("backend.layouts.main")
@section("title","danh sách sản phẩm")
@section("content")
<h1>danh sách sản phẩm </h1>
@if(session('status'))
<div class="alert alert-success">
    {{ session('status')}}
</div>
@endif
@if(session('statusdelette'))
<div class="alert alert-success">
    {{ session('statusdelette')}}
</div>
@endif
<div style="padding: 20px;">
	<a href="{{ url("backend/product/create")}}" class="btn btn-info"> Thêm sản phẩm</a>
</div>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>id sản phẩm</th>
            <th>Ảnh đại diện</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Tồn kho</th>
            <th>Hành động</th>
        </tr>
    </thead>
   {{--  <tfoot>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </tfoot> --}}
    <tbody>
@if(isset($productsssss))
    @foreach($productsssss as $danhsachsanpham)
    
        <tr>

           <td>{{ $danhsachsanpham->id }}</td>

           <td></td>

           <td>{{ $danhsachsanpham->product_name }}</td>

           <td>{{ $danhsachsanpham->product_price }} USD</td>

           <td>{{ $danhsachsanpham->product_quantity }}</td>

           <td>
                <a href="{{ url("/backend/product/edit/$danhsachsanpham->id")}}" class="btn btn-warning">Sửa sản phẩm</a>
                <a href="{{ url("/backend/product/delete/$danhsachsanpham->id")}}" class="btn btn-danger">Xóa sản phẩm</a>
           </td>

       </tr>
    @endforeach

@endif  
  {{--       <tr>
            <td>Jonas Alexander</td>
            <td>Developer</td>
            <td>San Francisco</td>
            <td>30</td>
            <td>2010/07/14</td>
            <td>$86,500</td>
        </tr> --}}
    </tbody>
</table>
{{ $productsssss->links()}}
@endsection