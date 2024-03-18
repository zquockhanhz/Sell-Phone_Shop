
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <?php if (! empty($products) && is_array($products)): $num = 0; ?>
                            
                            <?php foreach($products as $product): $num++;?>
                                <div class="thubmnail-recent">
                                    <img src="<?=base_url()?>productImages/<?= esc($product['product_img']) ?>" class="recent-thumb" alt="">
                                    <h2><a href="<?=base_url()?>product/<?= esc($product['product_id']) ?>"><?= esc($product['product_name']) ?></a></h2>
                                    <div class="product-sidebar-price">
                                        <ins><?= esc(currency_format($product['product_price'])) ?></ins>
                                    </div>                             
                                </div>
                                <?php 
                                if($num == 3){
                                    break;
                                }
                                endforeach?>
                            <?php endif ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img  width="255" height="255" src="<?=base_url()?>productImages/<?= esc($product['product_img']) ?>" alt="<?= esc($product['product_name']) ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?= esc($product['product_name']) ?></h2>
                                    <div class="product-inner-price">
                                        <ins><h4><?= esc(currency_format($product['product_price'])) ?></h4></ins>
                                    </div>
                                    <form action="<?php echo base_url();?>productadd/<?= esc($product['product_id']) ?>" method="post" class="cart">
                                    <?= csrf_field() ?>
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="quantity" value="1" name="quantity" id="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Mua ngay</button>
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <h4>Thương Hiệu: <?= esc($category) ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            <div role="tabpanel">
                <ul class="product-tab" role="tablist">
                    <li class="active"><a href="">Thông tin sản phẩm</a></li>
                </ul>
                <div class="tab-content">
                    <p><?= esc($product['product_detail']) ?></p>
                </div>
            </div>
        </div>
    </div>

