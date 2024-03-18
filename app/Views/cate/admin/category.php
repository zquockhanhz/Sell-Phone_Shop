

<div class="row">

    <!-- message-->
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
                Thêm
            </button>
        <div class="table-responsive table-responsive-data2">
        <?php if (! empty($categories) && is_array($categories)): ?>
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th width="80%" >Tên thương hiệu</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $categories_item): ?>
                        <tr style="">
                            <td><?= esc($categories_item['category_name']) ?></td>
                            <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= esc($categories_item['category_name']) ?>">
                                Xoá
                            </button>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= esc($categories_item['category_name']) ?>">
                                Sửa
                            </button>
                        </td>
                        </tr>
                    
                    <div class="modal fade" id="deleteModal<?= esc($categories_item['category_name']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <form action="<?php echo base_url();?>catedel/<?= esc($categories_item['category_name']) ?>" method="post">
                    <?= csrf_field() ?>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xoá thương hiệu <?= esc($categories_item['category_name']) ?></h5>  
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


                    <div class="modal fade" id="editModal<?= esc($categories_item['category_name']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <form action="<?php echo base_url();?>cateedit/<?= esc($categories_item['category_name']) ?>" method="post">
                    <?= csrf_field() ?>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <input type="text" id="category_name" value="<?= esc($categories_item['category_name']) ?>" name="category_name" placeholder="Category Name" class="form-control">
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
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE -->
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>
    <form action="<?php echo base_url();?>cate" method="post">
    <?= csrf_field() ?>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm thương hiệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <input type="text" id="category_name" name="category_name" class="form-control">
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