<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //Mac dinh
$routes->get('/welcome', 'Welcome::index');
$routes->get('/welcome/view', 'Welcome::view');

//Dang nhap va dang ki admin
$routes->get('login', 'User::indexAdmin');
$routes->post('login', 'User::loginAdmin');
$routes->get('signup', 'User::registerAdmin');
$routes->post('signup', 'User::createAdmin');

//Đang nhap va dang ki customer
$routes->get('logincustomer', 'User::indexCustomer');
$routes->post('loginCustomer', 'User::loginCustomer');
$routes->get('signupcustomer', 'User::signupCustomer');
$routes->post('signupcustomer', 'User::createCustomer');

//Dang xuat
$routes->get('logoutcustomer', 'User::logoutcustomer');
$routes->get('logout', 'User::logout');

//categories
$routes->get('cate', 'Category::index');
$routes->post('cate', 'Category::create');         
$routes->get('cateAdmin', 'Category::indexAdmin');          
$routes->get('cate/newcate', 'Category::new');
$routes->post('cateedit/(:segment)', 'Category::edit/$1');
$routes->post('catedel/(:segment)', 'Category::delete/$1');

//Quan ly san pham
$routes->get('productAdmin', 'Product::indexAdmin');
$routes->post('productadd', 'Product::create');
$routes->post('productedit/(:segment)', 'Product::edit/$1');
$routes->post('productdel/(:segment)', 'Product::delete/$1');
$routes->post('productadd/(:segment)', 'Cart::addcart/$1');

//View san pham
$routes->get('/', 'Product::indexProduct');
$routes->get('shop', 'Product::allProduct');
$routes->get('product/(:segment)', 'Product::view/$1');

//Gio hang
$routes->get('cart', 'Cart::showcart');
$routes->get('delcart/(:segment)', 'Cart::delCart/$1');
$routes->post('order', 'Order::DatHang');
$routes->get('CartAdmin', 'Cart::showcart');

//donhang
//Admin
$routes->get('orderAdmin', 'Order::xemDonHangAdmin');
$routes->post('del_order/(:segment)', 'Order::XoaDonHang/$1');

//Customer
$routes->get('cus_order', 'Order::DonHangCus');
$routes->post('recieved/(:segment)', 'Order::daNhanDonHang/$1');
$routes->post('cancel/(:segment)', 'Order::HuyDonHang/$1');

//Lien he
$routes->get('contact', 'Contact::index');   
