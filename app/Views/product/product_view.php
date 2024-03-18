
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
            <?php if (! empty($products) && is_array($products)): ?>
                <?php foreach($products as $product):?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                        <a href="<?=base_url()?>product/<?= esc($product['product_id']) ?>"><img style="height: 100%;"  src="<?=base_url()?>productImages/<?= esc($product['product_img']) ?>" alt=""></a>
                        </div>
                        <h2><a href="<?=base_url()?>product/<?= esc($product['product_id']) ?>"><?php if (strlen($product['product_name']) >= 20) {
                                echo substr($product['product_name'], 0, 30). " ... " . substr($product['product_name'], -5);
                            }
                            else {
                                echo $product['product_name'];
                            } ?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?= esc(currency_format($product['product_price'])) ?></ins> <del> </del>
                        </div>                      
                    </div>
                </div>
                <?php endforeach?>
            </div>
            <?php endif ?>
        </div>
    </div>
   