@extends("backend.layouts.main")
@section("title","chinh sua category")
@section("content")
<h1>Chỉnh sửa category</h1>
@if(session('statuscapnhat'))
	<div class="alert alert-success">
		{{ session('statuscapnhat')}}
	</div>
@endif
@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $errors1)
		<li>{{$errors1}}</li>
		@endforeach
	</ul>
</div>
@endif
<form name="product" action="{{ url("backend/category/update/$getidcategory->id")}}" method="post">
	@csrf
    <div class="form-group">
      <label for="category_name">Tên cate:</label>
      <input type="text" class="form-control" id="category_name" value="{{ $getidcategory->category_name}}" name="category_name">
    </div>
    <div class="form-group">
      <label for="product_image">ảnh cate:</label>
      <input type="file" class="form-control" id="product_image" name="category_image">
    </div>
	<div class="form-group">
		<label for="product_descrip">Mô tả category</label>
		<textarea name="product_desc" class="form-control" id="category_desc" cols="30" rows="10">
			{{ $getidcategory->category_desc}}
		</textarea>
	</div>
	
	
    <button type="submit" class="btn btn-success">Cập nhật danh mục</button>
  </form>
@endsection
@section("appendjs")
<link rel="stylesheet" href="{{ asset("/be-assets/js/bootstrap-datetimepicker.min.css") }}" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
<script src="{{ asset("/be-assets/js/bootstrap-datetimepicker.min.js") }}"></script>
<script type="text/javascript">
	// định dạng thời gian là YYYY-MM-DD HH:mm:ss
   $(function () {
       $('#product_publish').datetimepicker({
       	format:"YYYY-MM-DD HH:mm:ss",
       	icons: {
			   time: 'far fa-clock',
			   date: 'far fa-calendar',
			   up: 'fas fa-arrow-up',
			   down: 'fas fa-arrow-down',
			   previous: 'fas fa-chevron-left',
			   next: 'fas fa-chevron-right',
			   today: 'fas fa-calendar-check',
			   clear: 'far fa-trash-alt',
			   close: 'far fa-times-circle'
			}
       });
   });
</script>
<script src="{{ asset("/be-assets/js/tinymce/tinymce.min.js") }}"></script>
<script>
   tinymce.init({
       selector: '#product_desc'
   });
</script>
@endsection