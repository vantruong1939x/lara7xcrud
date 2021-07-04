@extends("backend.layouts.main")
@section("title"," xóa sản phẩm")
@section("content")
<h1>Xóa sản phẩm</h1>
<form name="product" action="{{ url("/backend/category/destroy/$categorydelete->id") }}" method="post">
       @csrf
       <div class="form-group">
           <label for="category_name">ID danh mục:</label>
           <p>{{ $categorydelete->id }}</p>
       </div>
       <div class="form-group">
           <label for="category_name">Tên cate:</label>
           <p>{{ $categorydelete->category_name }}</p>
       </div>
       <button type="submit" class="btn btn-danger">Xác nhận xóa cate</button>
   </form>
@endsection
