<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;


class Contact extends BaseController

{
    //Trang lien he
    public function index()
    { 
        return view('shop_view/templates/header',)
            . view('contact/contact')
            . view('shop_view/templates/footer');
    }
}