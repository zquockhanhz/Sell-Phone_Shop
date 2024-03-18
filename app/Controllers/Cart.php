<?php

namespace App\Controllers;

use App\Models\CartModel;
use CodeIgniter\Exceptions\PageNotFoundException;


class Cart extends BaseController

{
    //Khoi tao         
    function __construct()
    {
        $session = session();
    }

    //Cart customer
    public function showcart()
    {
        if  (!isset($_SESSION['user_id'])){
            return redirect()->route('logincustomer')->with('error','Bạn cần đăng nhập để tiếp tục');
        }
        
        $model = model('App\Models\CartModel');
        $items=[];
        foreach($model->getCartuser() as $item){
            $productmodel= model('App\Models\ProductModel');
            $product=$productmodel->getProduct($item['product_id']);
            array_push($items,array(
                'product_id'=>$item['product_id'],
                'quantity'     => $item['quantity'],
                'product_price'   => $product['product_price'],
                'product_name'    => $product['product_name'],
                'product_img'    => $product['product_img'],
            ));
        };
        $data=[
            'items'=>$items
        ];
        
        return view('shop_view/templates/header',$data)
            . view('cart/cartCus')
            . view('shop_view/templates/footer');
    }

    //Them gio hang
    public function addcart($product)
    {
        if  (!isset($_SESSION['user_id'])){
            return redirect()->route('logincustomer')->with('error','Bạn cần đăng nhập để tiếp tục');
        }
        $modelde = model('App\Models\CartModel');
        if($modelde->getCartde($product)!=null){
    
            $post=$this->request->getPost('quantity');
            $modelde->editCart($product,$post);
        }
        else{
            $modelde->save([
                
                'user_id'=>$_SESSION['user_id'],
                'product_id'=> $product,
                'quantity'=>$this->request->getPost('quantity')
            ]);}
            return redirect()->route('cart');
    }

    //Xoa gio hang
    public function delCart($product)
    {
        $modelde = model('App\Models\CartModel');
        
            $modelde->delCart($product);    
    return redirect()->route('cart');
    }
}