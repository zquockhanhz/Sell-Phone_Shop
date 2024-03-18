
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h1 class="text-center">TECHNO SHOP</h1>
                        <div class="product-carousel">
                            <?php if (! empty($products) && is_array($products)): ?>
                            <?php foreach($products as $product):?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <a href="<?=base_url()?>product/<?= esc($product['product_id']) ?>"><img style="height: 100%;"  src="<?=base_url()?>productImages/<?= esc($product['product_img']) ?>" alt=""></a>
                                    </div>
                                    <h2><a href="<?=base_url()?>product/<?= esc($product['product_id']) ?>"><?= esc($product['product_name']) ?></a></h2>
                                <div class="product-carousel-price">
                                <ins><?= esc(currency_format($product['product_price']))  ?></ins>
                            </div> 
                        </div>
                        <?php endforeach?>
                        <?php endif ?>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
   