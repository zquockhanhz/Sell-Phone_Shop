<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Đăng nhập</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
      <!--Main Navigation-->
  <header>
    <style>
      #bg {
        background-image: url(<?=base_url()?>backgroundImg/Phone.jfif);
        height: 110vh;
      }
    </style>


    <div id="bg" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
        
          <div class="row justify-content-center">
          
            <div class="col-xl-5 col-md-8">
            <?php if(session()->has('success')){
                echo '<div class="alert alert-success" role="alert">
                '.session()->getFlashdata('success').'
                </div>';
            }?>
            <?php if(session()->has('error')){
                echo '<div class="alert alert-danger" role="alert">
                '.session()->getFlashdata('error').'
                </div>';
            }?>
              
                <?= validation_list_errors() ?>
                <form class="bg-white rounded shadow-5-strong p-5" action="<?php echo base_url();?>loginCustomer" method="post">
                <?= csrf_field() ?>

                <div class="form-outline mb-4">
                  <h2 class="form-label" for="username">Đăng nhập</h2>
                </div>

                <div class="form-outline mb-4">
                  <input type="username" id="username" name="username" class="form-control" />
                  <label class="form-label" for="username">Tên tài khoản</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="password" name="password" class="form-control" />
                  <label class="form-label" for="password">Mật khẩu</label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                <div class="form-check">
                  <div class="register-link">
                    <p>
                      Chưa có tài khoản -
                      <a href="<?php echo base_url();?>signupcustomer">Đăng ký</a>
                    </p>
                  </div> 
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
   
  </header>
  
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>