
<main>
        <div class="container mt-4">
            <h2 class="text-center">Giỏ hàng</h2>
            <div class="row">
                <div class="col col-md-12">
                <?php if (! empty($items) && is_array($items)): ?>
                    <?php if(session()->has('success')){
                            echo '<div class="alert alert-success" role="alert">
                            '.session()->getFlashdata('success').'
                            </div>';
                        }?>
                        <form method="post" action="order">
                        <?= csrf_field() ?>
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Thành tiền</th>
                                    <th class="product-remove">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody id="datarow">
                                <?php foreach ($items as $item): ?>
                                    <tr class="cart_item">
                                        <td class="product-thumbnail">
                                            <a href="product/<?= esc($item['product_id']) ?>"><img width="145" height="145" alt="<?= esc($item['product_name']) ?>'s image" class="shop_thumbnail" src="<?=base_url()?>productImages/<?= esc($item['product_img']) ?>"></a>
                                        </td>

                                        <td class="product-name">
                                            <a href="product/<?= esc($item['product_id']) ?>"><?= esc($item['product_name']) ?></a> 
                                        </td>

                                        <td class="product-price">
                                            <span class="amount"><?= currency_format(esc($item['product_price'])) ?></span> 
                                        </td>

                                        <td class="product-quantity">
                                            <span class="amount"><?php echo $item['quantity'];?></span> 
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount"><?php echo currency_format($item['quantity']*$item['product_price']);?></span> 
                                        </td>

                                        <td class="product-remove">
                                            <a class="remove" href="delcart/<?= esc($item['product_id']) ?>">Xoá sản phẩm</a> 
                                        </td>
                                    </tr>
                                    <?php endforeach ?>

                                    <tr>
                                        <td class="actions" colspan="6">
                                            <input type="submit" value="Đặt hàng" name="proceed" class="checkout-button button alt wc-forward">
                                        </td>
                                    </tr>
                                    <h4>
                                        <a href="<?=base_url()?>shop">Tiếp tục mua hàng</a>
                                    </h4>
                                </tbody>
                            </table>
                        </form>
                        <?php else: ?>
                            <?php if(session()->has('message')){
                            echo '<div class="alert alert-primary" role="alert">
                            '.session()->getFlashdata('message').'
                            </div>';
                        }?>
                        <?php endif ?>
                </div>
            </div>
        </div>
    </main>