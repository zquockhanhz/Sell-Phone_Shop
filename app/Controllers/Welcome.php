<?php

namespace App\Controllers;

class Welcome extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function view($page = 'home')
    {
        $data['title']= 'Chào mừng bạn đến với CI4';
        return view('templates/header',$data)
                .view('pages/' . $page,$data)
                .view('templates/footer',$data);
    }
}
