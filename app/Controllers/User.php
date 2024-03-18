<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;


class User extends BaseController
{
    function __construct()
    {
        $session = session();
    }

    public function indexAdmin()
    {
        helper('form');
        $model = model('App\Models\UserModel');
        
        return view('admin/login'); 
    }

    //Dang ky Admin
    public function registerAdmin()
    {
        helper('form');
        $model = model('App\Models\UserModel');
        
        return view('admin/register');     
    }

    public function createAdmin()
    {
        helper('form');

        if (! $this->validate([
            'username' => 'required|max_length[255]|min_length[3]',
            'password' => 'required|max_length[255]|min_length[3]',
        ])) {
        
            return $this->registerAdmin();
        }
        
        $post = $this->validator->getValidated();

        $model = model('App\Models\UserModel');
        
        $model->save([
            'username' => $post['username'],
            'password' => bin2hex($post['password']),
            'auth' => 1,
        ]);

        return redirect()->route('login');
    }

    //Dang nhap Admin
    public function loginAdmin()
    {
        helper('form');

        if (! $this->validate([
            'username' => 'required|max_length[255]|min_length[3]',
            'password' => 'required|max_length[255]|min_length[3]'
        ])) {
            return $this->indexAdmin();
        }
        $post = $this->validator->getValidated();
        $model = model('App\Models\UserModel');
        $model->loginAdmin($post);
        if(!$model->loginAdmin($post)){
            return redirect()->route('login')->with('error','Tên tài khoản hoặc mật khẩu không tồn tại!');
        }
        
        return redirect()->route('cateAdmin');
    }

    //Dang xuat
    public function logout()
    {
        session_destroy();
        return redirect()->route('login');
    }


    //Khach hang
    public function indexCustomer()
    {
        helper('form');
        $model = model('App\product\UserModel');
        
        return view('customer/login');  
    }

    //Dang ky khach hang
    public function signupCustomer()
    {
        helper('form');
        $model = model('App\product\UserModel');
        
        return view('customer/register'); 
    }
    public function createCustomer(){
        helper('form');

        if (! $this->validate([
            'username' => 'required|max_length[255]|min_length[3]',
            'password' => 'required|max_length[255]|min_length[3]',
        ])) {
         
            return redirect()->route('signupcustomer')->with('error','Lỗi');
        }
        
        $post = $this->validator->getValidated();

        $model = model('App\Models\UserModel');
        
        $model->save([
            'username' => $post['username'],
            'password' => bin2hex($post['password']),
            'auth' => 0,
        ]);
        return redirect()->route('logincustomer')->with('success','Tài khoản tạo thành công');
    }

    //Dang nhap khach hang
    public function loginCustomer()
    {
        helper('form');

        if (! $this->validate([
            'username' => 'required|max_length[255]|min_length[3]',
            'password' => 'required|max_length[255]|min_length[3]'
        ])) {
            $request = \Config\Services::request();

            return redirect()->route('logincustomer')->with('error','Lỗi');
        }
        $post = $this->validator->getValidated();
        $model = model('App\Models\UserModel');
        $model->loginCustomer($post);
        if(!$model->loginCustomer($post)){
            return redirect()->route('logincustomer')->with('error','Tên tài khoản hoặc mật khẩu không tồn tại!');
        }

        return redirect()->route('/');
    }

    //Dang xuat khach hang
    public function logoutcustomer()
    {
        session_destroy();
        return redirect()->route('/');
    }
}