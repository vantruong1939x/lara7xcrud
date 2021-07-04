<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\CategorysModel;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
        public function index(){
    
        $productt = DB::table('category')->paginate(1);
        $data =[];
        $data['productsssss']= $productt;
    	return view("backend.category.index",$data);
    }
        public function create(){
    	return view("backend.category.create");
    }
        public function edit($id){
        $cate2 = CategorysModel::findOrFail($id);
      
        $data=[];
        $data['getidcategory']=$cate2;
    	return view("backend.category.edit",$data);
    }
       public function update(Request $requestdulieu,$id){
        echo '<br> id: '.$id;
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        // validate dữ liệu
        $validatedata=$requestdulieu->validate(
            [
                'category_name' => 'required',
                'product_desc' => 'required',
               
            ]
        );
        $category_name = $requestdulieu->input('category_name','');
        $category_desc = $requestdulieu->input('product_desc','');
      
        // lấy đối tượng model dựa trên biến $id
        $cateupo = CategorysModel::findOrFail($id);
        $cateupo->category_name =$category_name;
        $cateupo->category_desc =$category_desc;
       
          // gắn tạm cate_image là rỗng vì chưa upload ảnh
          $cateupo->category_image="";
          $cateupo->parent_id="1";
         // lưu 
         $cateupo->save();
         // lưu xong rồi thì chuyển hướng nó tới trang edit
          return redirect("/backend/category/edit/$id")->with('statuscapnhat','cập nhật category thành công !');
    }
     public function delete($id){
        $producdelete = CategorysModel::findOrFail($id);
        // truyền dữ liệu xuống view
        $data=[];
        $data['categorydelete']=$producdelete;
    	return view("backend.category.delete",$data);
    }
       public function destroy($id){
        echo '<br> id '.$id;
        // lấy dối tượng dựa  trên id mà request được
        $catedele= CategorysModel::findOrFail($id);
        $catedele->delete();
        return redirect("/backend/category/index")->with('statusdelette','Xóa category thành công !');
    }
       public function store(Request $requesst){
        // validate dữ liệu 
        // sử dụng key là ô input submid dữ liệu
        // value là cách để validate (require)

        $validatedData = $requesst->validate([
           'category_name' => 'required',
           'product_desc' => 'required',
        ]);
        $category_name = $requesst->input('category_name','');
        $category_desc = $requesst->input('product_desc','');
        $category = new CategorysModel();
         $category->category_name = $category_name;
         $category->category_desc = $category_desc;
         
        
         // gắn tạm cate_image là rỗng vì chưa upload ảnh
         $category->category_image="";
          $category->parent_id="1";
         // lưu sản phẩm
         $category->save();
         // chuyển hướng về trang với url là /backend/category/index
        return redirect("/backend/category/index")->with('status','Thêm danh mục thành công !');

    }
}
