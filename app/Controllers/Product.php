<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\CateModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Files\File;

class Product extends BaseController

{
    //Khoi tao         
    function __construct()
    {
        $session = session();
    }

    //Trang Admin
    public function indexAdmin()
    {
        
         if  (!isset($_SESSION['user_id'])){
            return redirect()->route('login')->with('error','Bạn cần đăng nhập để tiếp tục');
        }
        
        helper('form');

        $model = model('App\Models\ProductModel');
        $modelcate = new CateModel();
        $data = [
            'categories'=>$modelcate->getCategories(),
            'products'  => $model->getProduct(),
            'title' => 'SẢN PHẨM',
        ];
        
        return view('cate/admin/templates/header', $data)
                . view('product/admin/product')
                . view('cate/admin/templates/footer');
    }
    
    //Them san pham
    public function create()
    {
        helper('form');

        if ($_FILES['product_img']['size']>0) {
        
        if (! $this->validate([
            'product_name' => 'required|max_length[255]|min_length[3]',
            'product_price' => 'required|numeric|greater_than[0]',
            'product_quantity' => 'required|numeric|greater_than[-1]',
            
            'product_detail' => 'required|max_length[1000]|min_length[3]',
            'product_category_id' => 'required|max_length[255]|min_length[1]',
            'product_img' => [
              
                'rules' => [
                    'uploaded[product_img]',
                    'is_image[product_img]',
                    'mime_in[product_img,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                ],
            ],
        ])) {
           
            return redirect()->route('productAdmin')->with('error','Lỗi');
        }
    }
    else{
        if (! $this->validate([
            'product_name' => 'required|max_length[255]|min_length[3]',
            'product_price' => 'required|numeric|greater_than[0]',
            'product_quantity' => 'required|numeric|greater_than[-1]',
            
            'product_detail' => 'required|max_length[1000]|min_length[3]',
            'product_category_id' => 'required|max_length[255]|min_length[1]',
            
        ])) {
            
            return redirect()->route('productAdmin')->with('error','Lỗi');
        }
    }

        $post = $this->validator->getValidated();
        $model = model('App\Models\ProductModel');

        if($_FILES['product_img']['size']>0){

            $img = $this->request->getFile('product_img');
    
            if ($img->hasMoved()) {
                
                return redirect()->route('productAdmin')->with('error','Lỗi');
            }
            $mypath='C:/xampp/htdocs/CI4';
           
            $filepath = $mypath.'uploads/' . $img->getName();
            
            $data = ['uploaded_fileinfo' => new File($filepath)];
            
            $post['img']=$post['product_name'].date('m.d.y').$img->getName();
            
            $img->move(ROOTPATH.'public/productImages',$post['product_name'].date('m.d.y').$img->getName());
        }
       if($_FILES['product_img']['size']>0){

        $model->save([
            'product_name' => $post['product_name'],
            'product_price' => $post['product_price'],
            'product_quantity' => $post['product_quantity'],
            'product_img' => $post['img'],
            'product_detail' => $post['product_detail'],
            'product_category_id' => $post['product_category_id'],
        ]);
    }
    else{
        
        $model->save([
            'product_name' => $post['product_name'],
            'product_price' => $post['product_price'],
            'product_quantity' => $post['product_quantity'],
            'product_img' => 'empty',
            'product_detail' => $post['product_detail'],
            'product_category_id' => $post['product_category_id'],
        ]);
    }
        return redirect()->route('productAdmin')->with('success','Sản phẩm đã được thêm');
    }

    //Sua san pham 
    public function edit($slug = null)
    {
        
        helper('form');
        if ($_FILES['product_img']['size']>0) {
        
        if (! $this->validate([
            'product_name' => 'required|max_length[255]|min_length[3]',
            'product_price' => 'required|numeric|greater_than[0]',
            'product_quantity' => 'required|numeric|greater_than[-1]',
            
            'product_detail' => 'required|max_length[1000]|min_length[3]',
            'product_category_id' => 'required|max_length[255]|min_length[1]',
            'product_img' => [

                'rules' => [
                    'uploaded[product_img]',
                    'is_image[product_img]',
                    'mime_in[product_img,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
   
                ],
            ],
        ])) {
            return redirect()->route('productAdmin')->with('error','Lỗi');
        }
    }
    else{
        if (! $this->validate([
            'product_name' => 'required|max_length[255]|min_length[3]',
            'product_price' => 'required|numeric|greater_than[0]',
            'product_quantity' => 'required|numeric|greater_than[-1]',
            
            'product_detail' => 'required|max_length[1000]|min_length[3]',
            'product_category_id' => 'required|max_length[255]|min_length[1]',
            
        ])) {
            return redirect()->route('productAdmin')->with('error','Lỗi');
        }
    }

        $post = $this->validator->getValidated();

        $model = model('App\Models\ProductModel');
       
        if($_FILES['product_img']['size']>0){
            $preimg=$model->getProduct($slug);
        if(file_exists(("productImages/".$preimg['product_img']))){
            unlink("productImages/".$preimg['product_img']);
        }

            $img = $this->request->getFile('product_img');
    
            if ($img->hasMoved()) {
                
                return redirect()->route('productAdmin')->with('error','Lỗi');
            }
            $mypath='C:/xampp/htdocs/CI4';
           
            $filepath = $mypath.'uploads/' . $img->getName();
            
            $data = ['uploaded_fileinfo' => new File($filepath)];
            
            $post['img']=$post['product_name'].date('m.d.y').$img->getName();
            
            $img->move(ROOTPATH.'public/productImages',$post['product_name'].date('m.d.y').$img->getName());
        }

        $model->editProduct($slug,$post);

        return redirect()->route('productAdmin')->with('success','Thông tin sản phẩm đã được sửa');
    }

    //Xoa san pham
    public function delete($slug = null)
    {
        $model = model('App\Models\ProductModel');
        $preimg=$model->getProduct($slug);
        if  ($preimg['product_img']!=null){
            if(file_exists(("productImages/".$preimg['product_img']))){
                unlink("productImages/".$preimg['product_img']);
            }
        }
        
        $model->delProduct($slug);
       
        return redirect()->route('productAdmin')->with('success','Sản phẩm đã được xoá');
    }

    //Trang khach hang
    public function index()
    { 
        return view('shop_view/templates/header',)
            . view('shop_view/index')
            . view('shop_view/templates/footer');
    }

    public function indexProduct()
    {
        $model = model('App\Models\ProductModel');
        $catemodel= model('App\Models\CateModel');
        
        $data = [
            'cate'  => $catemodel->getCategories(),
            'products'  => $model->getProduct(),
        ];
        
        return view('shop_view/templates/header',$data)
            . view('shop_view/index')
            . view('shop_view/templates/footer');
    }

    //View tat ca san pham
    public function allProduct()
    {
        $model = model('App\Models\ProductModel');
        $modelcate = new CateModel();
        $data = [
            
            'products'  => $model->getProduct(), 
        ];
        
        return view('shop_view/templates/header',$data)
            . view('product/product_view')
            . view('shop_view/templates/footer');
    }

    //View chi tiet san pham
    public function view($slug=null)
    {
        $catemodel= model('App\Models\CateModel');
        $model= model('App\Models\ProductModel');
        $cate=$model->getProduct($slug);
        
        $data=[
            'product'  => $model->getProduct($slug),
            'category'=>($catemodel->getCategoriesbyID($cate['product_category_id']))['category_name']
        ];
        
        return view('shop_view/templates/header',$data)
            . view('product/detail_product')
            . view('shop_view/templates/footer');
    }
}