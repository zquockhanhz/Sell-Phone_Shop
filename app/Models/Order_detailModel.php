<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderdeModel extends Model
{
    protected $table = 'order_detail';
    protected $allowedFields = ['orderde_id','order_id','product_id','quantity'];
    
    public function getOrderde($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->where(['order_id' => $slug])->find();
    }
}