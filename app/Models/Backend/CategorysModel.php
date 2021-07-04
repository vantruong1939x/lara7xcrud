<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class CategorysModel extends Model
{
    //
        //khai baó tên bảng
    protected $table ='category';
    // khai báo khóa chính 
    protected $primarykey = 'id';
}
