<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\Order_detailModel;
use App\Models\CartModel;
use CodeIgniter\Exceptions\PageNotFoundException;


class Order extends BaseController
{

    //Admin
    public function index()
    {
        $session=session();
        if  (!isset($_SESSION['user_id'])){
            return redirect()->route('login')->with('error','Bạn cần đăng nhập để tiếp tục');
        }
        $order=model('App\Models\OrderModel');
        $orderdetail=model('App\Models\Order_detailModel');
        $data = [
            'order'  => $order->getOrder(),
            'orderdetail' => $orderdetail->getOrderde()
        ];
       
        return view('cate/admin/templates/header', $data)
            . view('cate/admin/templates/footer');
    }

    //Trang quan ly don hang Admin
    public function xemDonHangAdmin()
    {
        $session=session();
        if  (!isset($_SESSION['user_id'])){
            return redirect()->route('login')->with('error','Bạn cần đăng nhập để tiếp tục');
        }
        helper('form');

        $order=model('App\Models\OrderModel');
        $product=model('App\Models\ProductModel');
        $orderdetail=model('App\Models\Order_detailModel');
        $ordersorted= $order->getOrder();
        
        $data=[
            'title'=>'ĐƠN HÀNG',
            'orders'=> $ordersorted,
            'products'=>$product->getProduct(),
            'orderdes'=>$orderdetail->getOrderde(),
        ];

        return view('cate/admin/templates/header', $data)
        . view('order/admin/order_Admin')
        . view('cate/admin/templates/footer');
    }

    //Khach hang
    //Dat hang
    public function DatHang()
    {
        $session=session();
        $order=model('App\Models\OrderModel');
        
        $order->save([
            'user_id'=>$_SESSION['user_id'],
            'total'=>0,
            'confirm_date'=>null,
            'order_date'=>date('Y-m-d')
        ]);
        $orderdetail=model('App\Models\Order_detailModel');
        $model=model('App\Models\CartModel');
        $total=0;
        
        foreach($model->getCartuser() as $item){
            
            $orderdetail->save([
                'order_id'=> $order->getinsertID(),
                'product_id'=>$item['product_id'],
                'quantity'=>$item['quantity']
            ]);
            $productmodel= model('App\Models\ProductModel');
            $product=$productmodel->getProduct($item['product_id']);
            $total=$total+($item['quantity']*$product['product_price']);
        };
        $order
        ->where('order_id', $order->getinsertID())
        ->set(['total' => $total])
        ->update();
        $model->where('user_id', $_SESSION['user_id'])->delete();
        return redirect()->route('cart')->with('message','Đặt hàng thành công');
    }

    //Don hang
    public function DonHangCus()
    {
        $session=session();
        if  (!isset($_SESSION['user_id'])){
            return redirect()->route('logincustomer')->with('error','Bạn cần đăng nhập để tiếp tục');
        }
        helper('form');

        $order=model('App\Models\OrderModel');
        $product=model('App\Models\ProductModel');
        $orderdetail=model('App\Models\Order_detailModel');
        $ordersorted= $order->getOrder($_SESSION['user_id']);
        
        $data=[
            'title'=>'',
            'orders'=> $ordersorted,
            'products'=>$product->getProduct(),
            'orderdes'=>$orderdetail->getOrderde(),
        ];

        return view('shop_view/templates/header', $data)
        . view('order/order')
        . view('shop_view/templates/footer');
    }

    //Huy don hang
    public function HuyDonHang($slug)
    {
        $order=model('App\Models\OrderModel');
        $order->CancelOrder($slug);
        return redirect()->route('cus_order')->with('success','Đơn hàng đã được huỷ');
    }

    //Admin xoa don hang
    public function XoaDonHang($slug)
    {
        $order=model('App\Models\OrderModel');
        $order->DelOrder($slug);
        return redirect()->route('orderAdmin')->with('success','Đơn hàng đã được xoá');
    }
}
?>