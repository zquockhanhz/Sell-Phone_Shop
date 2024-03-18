
<main>
        <div class="container mt-4">
            <h2 class="text-center">Đơn hàng</h2>
            <div class="row">
                <div class="col col-md-12">
                <?php if (! empty($orders) && is_array($orders)): ?>
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th>Ngày đặt hàng</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="datarow">
                                <?php foreach ($orders as $order): ?>
                                    <tr style="">
                                        <td><?= esc($order['order_date']) ?></td>
                                        <td><?= currency_format(esc($order['total'])) ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cancel<?= esc($order['order_id']) ?>">
                                                Huỷ đơn hàng
                                            </button>
                                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#view<?= esc($order['order_id']) ?>">
                                                Chi tiết
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                    <div class="modal fade" id="cancel<?= esc($order['order_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                    <form action="<?php echo base_url();?>cancel/<?= esc($order['order_id']) ?>" method="post">
                                    <?= csrf_field() ?>
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Huỷ đơn hàng này?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Huỷ</button>
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
                                </table>
                            <?php endif ?>
                            </tr>  
                            </table>
                        </form>
                </div>
            </div>
        </div>
    </main>