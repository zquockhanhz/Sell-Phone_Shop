<?php

namespace App\Controllers;
use App\Models\CateModel;
use CodeIgniter\Exceptions\PageNotFoundException;


class Category extends BaseController


{
    //Khoi tao         
    function __construct()
    {
        $session = session();
    }

    public function index()
    {
        $model = model('App\Models\CateModel');
        $data = [
            'categories'  => $model->getCategories(),
            'title' => 'All categories',
        ];
        
        return view('templates/header', $data)
            . view('cate/index')
            . view('templates/footer');
    }

    //Trang admin
    public function indexAdmin()
    {
        
        if  (!isset($_SESSION['user_id'])){
            return redirect()->route('login')->with('error','Bạn cần đăng nhập để tiếp tục');
        }
        
        helper('form');

        $model = model('App\Models\CateModel');
        $data = [
            'categories'  => $model->getCategories(),
            'title' => 'THƯƠNG HIỆU',
        ];
        
        return view('cate/admin/templates/header', $data)
                . view('cate/admin/category')
                . view('cate/admin/templates/footer');
    }
    
    //Thêm hãng
    public function create()
    {
        helper('form');

        if (! $this->validate([
            'category_name' => 'required|max_length[255]|min_length[3]',
            
        ])) {
            return redirect()->route('cateAdmin')->with('error','Lỗi');
        }
        
        $post = $this->validator->getValidated();

        $model = model('App\Models\CateModel');
       
        $model->save([
            'category_name' => $post['category_name'],
            
        ]);

        return redirect()->route('cateAdmin')->with('success','Thêm thành công');
    }


    //Sửa tên hãng
    public function edit($slug = null)
    {
        
        helper('form');

        if (! $this->validate([
            'category_name' => 'required|max_length[255]|min_length[3]',
            
        ])) {
            
            return redirect()->route('cateAdmin')->with('error','Lỗi');
        }
        
        $post = $this->validator->getValidated();

        $model = model('App\Models\CateModel');
       
        $model->editCategories($slug,$post);

        return redirect()->route('cateAdmin')->with('success','Sửa thành công');
    }

    //Xoá hãng
    public function delete($slug = null)
    {

        $model = model('App\Models\CateModel');
        
        $model->deleteCategories($slug);

        return redirect()->route('cateAdmin')->with('success','Xoá thành công');
    }
}