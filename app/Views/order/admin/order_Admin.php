

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
           
        <div class="table-responsive table-responsive-data2">
        <?php if (! empty($orders) && is_array($orders)): ?>
            <table class="table table-data2">
                <thead>
                    <tr>
                        <th width="20%" >Id đơn hàng</th>
                        <th width="20%" >Id khách hàng</th>
                        <th width="20%" >Ngày đặt hàng</th>
                        <th width="20%" >Thành tiền</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order): ?>
                        <tr style="">
                            <td><?= esc($order['order_id']) ?></td>
                            <td><?= esc($order['user_id']) ?></td>
                            <td><?= esc($order['order_date']) ?></td>
                            <td><?= esc(currency_format($order['total'])) ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#del_order<?= esc($order['order_id']) ?>">
                                    Xoá
                                    </button>
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#view<?= esc($order['order_id']) ?>">
                                    Chi tiết
                                </button>
                            </td>
                        </tr>

                    <!-- code -->
                    <div class="modal fade" id="del_order<?= esc($order['order_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <form action="<?php echo base_url();?>del_order/<?= esc($order['order_id']) ?>" method="post">
                    <?= csrf_field() ?>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Xoá đơn hàng này?
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Xoá</button>
                                    <input type="hidden" name="delete" value="Delete">
                                </div>
                            </div>
                        </div>
                    </form>
                    </div> 


                    <div class="modal fade" id="view<?= esc($order['order_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                <?php 
                                $orderdes_count = count($orderdes);
                                foreach ($orderdes as $key =>$orderdetail): 
                                
                                    if($orderdetail['order_id']==$order['order_id']):
                                        echo '<div class="order_item">';
                                        foreach($products as $product){
                                            if($product['product_id']==$orderdetail['product_id']){
                                                echo '<p>Tên sản phẩm '.$product['product_name'].'</p>';
                                                echo '<p>Số lượng '.$orderdetail['quantity'].'</p>';
                                            }
                                        }
                                    if ($key + 1 != $orderdes_count){
                                    echo '<hr></div>';
                                }
                                    endif;
                                endforeach;
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                                </div>
                            </div>
                        </div>
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


