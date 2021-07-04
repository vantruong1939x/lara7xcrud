@extends("backend.layouts.main")
@section("title","danh sách Category")
@section("content")
<h1>danh sách Danh mục </h1>
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
	<a href="{{ url("backend/category/create")}}" class="btn btn-info"> Thêm Category</a>
</div>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>id danh mục</th>
           
            <th>Tên Category</th>
             <th>Ảnh đại diện</th>
             <th>mô tả</th>
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
          <td>{{ $danhsachsanpham->category_name }}</td>
           <td></td>
           <td>{{ $danhsachsanpham->category_desc }} USD</td>
           <td>
                <a href="{{ url("/backend/category/edit/$danhsachsanpham->id")}}" class="btn btn-warning">Sửa danh mục</a>
                <a href="{{ url("/backend/category/delete/$danhsachsanpham->id")}}" class="btn btn-danger">Xóa danh mục</a>
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