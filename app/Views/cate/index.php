<section id="works" class="works">
  <div class="container">
    <div class="section-heading">
      <h1 class="title wow fadeInDown" data-wow-delay=".3s"><?= esc($title) ?></h1>
      <a href="<?php echo base_url()."cate/newcate";?>" class="btn btn-primary"></a>
    </div>
    <div class="row">
      <?php if (! empty($categories) && is_array($categories)): ?>
        <table class="table">
          <thead>
            <th></th>
          </thead>
        
          <?php foreach ($categories as $categories_item): ?>
                <tr>
                  <td>
                    <?= esc($categories_item['category_name']) ?>
                  </td>
                  <td>
                  <form action="<?php echo base_url();?>catedel/<?= esc($categories_item['category_name']) ?>" method="post">
                  <?= csrf_field() ?>
          <?php endforeach ?>
        </table>
      <?php endif ?> 
    </div>
  </div>
</section> 
            


