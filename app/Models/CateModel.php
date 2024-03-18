<?php

namespace App\Models;

use CodeIgniter\Model;

class CateModel extends Model
{
    protected $table = 'category';
    protected $allowedFields = ['category_id','category_name'];
    public function getCategories($slug = false)
    
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['category_name' => $slug])->first();
    }
    public function getCategoriesbyID($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['category_id' => $slug])->first();
    }

    public function deleteCategories($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }
        $this->where('category_name', $slug);
        return $this->delete();
    }

    public function editCategories($slug = false,$post=false)
    {
        if ($slug === false) {
            return $this->findAll();
        }
        $this->set('category_name',$post['category_name']);
        $this->where('category_name', $slug);
        return $this->update();
    }
}