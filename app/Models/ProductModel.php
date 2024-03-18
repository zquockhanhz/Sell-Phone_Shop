<?php

namespace App\Models;

use CodeIgniter\Model;


class ProductModel extends Model
{
    protected $table = 'product';
    protected $allowedFields = ['product_id','product_name','product_price','product_quantity','product_img'
    ,'product_detail','product_category_id'];

    public function getProduct($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->where(['product_id' => $slug])->first();
    }

    public function delProduct($slug = false)
    {
        if ($slug === false) {
            return false;
        }
        $this->where('product_id', $slug);
        return $this->delete();
    }

    public function editProduct($slug = false,$post=false)
    {
        if ($slug === false) {
            return false;
        }
        $this->set('product_name',$post['product_name']);
        $this->set('product_price',$post['product_price']);
        $this->set('product_quantity',$post['product_quantity']);
        if(isset($post['img'])){
            $this->set('product_img',$post['img']);
        }
        
        $this->set('product_detail',$post['product_detail']);
        $this->set('product_category_id',$post['product_category_id']);

        $this->where('product_id', $slug);
        return $this->update();
    }
}