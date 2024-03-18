<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $allowedFields = ['user_id','cart_id','product_id','quantity'];
    public function getCartde($prod = false)
    {
        if ($prod === false) {
            return $this->where(['user_id' => $slug]);
        }
        
        $array = ['user_id' => $_SESSION['user_id'], 'product_id' => $prod];
        return $this->where($array)->first();
    }

    public function getCartuser()
    {
        $result=$this->where(['user_id' => $_SESSION['user_id']])->find();
        return $result;
    }

    public function editCart($prod = false,$post=false)
    {
        
        $array = ['user_id' => $_SESSION['user_id'], 'product_id' => $prod];
        $quantity=$this->where($array)->first();
        
        $this->where($array);
        $this->set('quantity', $quantity['quantity']+$post);
        return $this->update();
    }
    
    public function delCart($prod = false)
    {
        if ($prod === false) {
            return $this->where(['user_id' => $slug]);
        }
        $array = ['user_id' => $_SESSION['user_id'], 'product_id' => $prod];
        $this->where($array);
        return $this->where($array)->delete();
    }
}