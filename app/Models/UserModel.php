<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['user_id','username','password','auth'];
    public function loginAdmin($slug = false)
    {
        $login = $this->where(['username' => $slug['username']])->first();
        
        if($login!=null){
            if (
                bin2hex($slug['password'])==$login['password'] &&
                $login['auth']==1
            ){
                $user_data= array(
                    'user_id'=>$login['user_id'],
                    'cart'=>'notenable'
                );
                $session=session();
                $session->set($user_data);
                    return true;
            } 
        }
        return false; 
    }

    
    public function loginCustomer($slug = false)
    {
        $login = $this->where(['username' => $slug['username']])->first();
        
        if($login!=null){
            if (
                bin2hex($slug['password'])==$login['password'] &&
                $login['auth']==0
            ){
                $user_data= array(
                    'user_id'=>$login['user_id'],
                    'cart'=>'enable'
                );
                $session=session();
                $session->set($user_data);
                    return true;
            }
        }
        return false;  
    }
}