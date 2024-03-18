<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order';
    protected $allowedFields = ['order_id','user_id','total','status','order_date'];

    public function getOrder($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->where(['user_id' => $slug])->find();
    }
    
    //Customer
    public function CancelOrder($slug = false)
    {
        $this->where('order_id', $slug);
        $this->delete();
        return true;
    }

    //Admin
    public function DelOrder($slug = false)
    {
        $this->where('order_id', $slug);
        $this->delete();
        return true;
    }
}
