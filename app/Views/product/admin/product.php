
<div class="row">

<!-- message, alert -->
        <?php if(session()->has('success')){
            echo '<div class="alert alert-success" role="alert">
            '.session()->getFlashdata('success').'
            </div>';
        }   ?>
        <?php if(session()->has('error')){
            echo '<div class="alert alert-danger" role="alert">
            '.session()->getFlashdata('error').'
            </div>';
        }   ?>
        
<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35"><?= $title ?></h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Thêm sản phẩm
        </button>
    <div class="table-responsive table-responsive-data2">
    
    <?php if (! (empty($products) && is_array($products))): ?>
        <table class="table table-data2">
            <thead>
                <tr>
                    
                    <th width="15%" >Tên sản phẩm</th>
                    <th width="20%" >Giá tiền</th>
                    <th width="5%" >Số lượng</th>
                    <th width="15%" >Hình ảnh</th>
                    <th width="20%" >Chi tiết</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                    <tr style="">
                        <td><?= esc($product['product_name']) ?></td>
                        <td><?= esc(currency_format($product['product_price'])) ?></td>
                        <td><?= esc($product['product_quantity']) ?></td>
                        <td><img src="<?=base_url()?>productImages/<?= esc($product['product_img']) ?>" alt="<?= esc($product['product_name']) ?>'s image"></td>
                        <td><?= esc($product['product_detail']) ?></td>
                        <td>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= esc($product['product_id']) ?>">
                            Xoá
                        </button>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= esc($product['product_id']) ?>">
                            Sửa
                        </button>
                    </td>
                    </tr>
                
                <div class="modal fade" id="deleteModal<?= esc($product['product_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                <form action="<?php echo base_url();?>productdel/<?= esc($product['product_id']) ?>" method="post">
                <?= csrf_field() ?>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xoá sản phẩm <?= esc($product['product_name']) ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-danger">Xoá</button>
                                <input type="hidden" name="delete" value="Delete">
                            </div>
                        </div>
                    </div>
                </form>
                </div> 


                <div class="modal fade" id="editModal<?= esc($product['product_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                <form action="<?php echo base_url();?>productedit/<?= esc($product['product_id']) ?>" method="post" enctype='multipart/form-data'>
                <?= csrf_field() ?>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Sửa sản phẩm <?= esc($product['product_name']) ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <input type="text" id="product_name" value="<?= esc($product['product_name']) ?>" name="product_name" placeholder="Product Name" class="form-control">
                            <input type="text" id="product_price" value="<?= esc($product['product_price']) ?>" name="product_price" placeholder="Product Price" class="form-control">
                            <input type="text" id="product_quantity" value="<?= esc($product['product_quantity']) ?>" name="product_quantity" placeholder="Product Quantity" class="form-control">
                            
                            <?= form_open_multipart('upload/upload') ?>
                            <input type="file" name="product_img" id="product_img" size="20" class="form-control mt-2">
                            <input type="text" id="product_detail" value="<?= esc($product['product_detail']) ?>" name="product_detail" placeholder="Product Detail" class="form-control">
                            <select class="custom-select" id="product_category_id" name="product_category_id">
                                
                                <?php foreach ($categories as $cate): ?>
                                <option <?php if ($product['product_category_id']==$cate['category_id']){ echo "selected";}?> value="<?= esc($cate['category_id']) ?>"><?= esc($cate['category_name']) ?></option>
                                <?php endforeach ?>
                            </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <input type="hidden" name="edit" value="Edit">
                            </div>
                        </div>
                    </div>
                </form>
                </div> 
                <?php endforeach ?>
                </table>

                <?php endif ?>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>
<form action="<?php echo base_url();?>productadd" method="post" enctype='multipart/form-data'>
<?= csrf_field() ?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">THÊM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
            
            <input type="text" id="product_name"  name="product_name" placeholder="Product Name" class="form-control">
            
            
            <input type="text" id="product_price"  name="product_price" placeholder="Product Price" class="form-control mt-2">
            

            <input type="text" id="product_quantity"  name="product_quantity" placeholder="Product Quantity" class="form-control mt-2">

            <?= form_open_multipart('upload/upload') ?>
            <input type="file" name="product_img" id="product_img" size="20" class="form-control mt-2">
    
            <input type="text" id="product_detail"  name="product_detail" placeholder="Product Detail" class="form-control mt-2">
      
  <select class="custom-select" id="product_category_id" name="product_category_id">
    
    <?php foreach ($categories as $cate): ?>
    <option value="<?= esc($cate['category_id']) ?>"><?= esc($cate['category_name']) ?></option>
    <?php endforeach ?>
  </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Thêm</button>
                <input type="hidden" name="Add" value="Add">
            </div>
        </div>
    </div>
</form>
</div> 