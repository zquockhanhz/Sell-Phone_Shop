
<?php $session= session();?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Techno Shop</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <style>
        .product-upper img {
    max-width: 100%;
    height :320px;
    }
    .product-f-image img {
        max-width: 100%;
        height :320px;
    }
    <style>
            .row hr:last-child {
    display: none;
    }
    </style>
  </head>
  <?php  
  if (!function_exists('currency_format')) {

    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }

}
  ?>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <?php if(!isset($_SESSION['user_id'])):?>
                                <li><a href="<?=base_url()?>logincustomer"><i class="fa fa-user"></i> Đăng nhập</a></li>
                                
                                <?php else :?>
                            <li><a href="<?=base_url()?>logoutcustomer"><i class="fa fa-user"></i> Đăng xuất</a></li>
                            <?php endif?>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                     
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
   
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?php if($_SERVER['REQUEST_URI'] === "/CI4/public/"){echo "active";}; ?>"><a href = "<?=base_url()?>">Trang chủ</a></li>
                        <li class = "<?php if($_SERVER['REQUEST_URI'] === "/CI4/public/shop"){echo "active";}; ?>"><a href="<?=base_url()?>shop">Sản phẩm</a></li>
                        <li class = "<?php if($_SERVER['REQUEST_URI'] === "/CI4/public/cart"){echo "active";}; ?>"><a href="<?=base_url()?>cart">Giỏ hàng</a></li>
                        <li class = "<?php if($_SERVER['REQUEST_URI'] === "/CI4/public/ordercus"){echo "active";}; ?>"><a href="<?=base_url()?>cus_order">Đơn hàng</a></li>
                        <li class = "<?php if($_SERVER['REQUEST_URI'] === "/CI4/public/contact"){echo "active";}; ?>"><a href="<?=base_url()?>contact">Liên hệ</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->