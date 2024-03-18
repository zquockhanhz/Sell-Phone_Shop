<h2>Detail </h2>

        <h3><?= esc($news_item['title']) ?></h3>

        <div class="main">
            <?= esc($news_item['category_name']) ?>
        </div>
        <p><a href="news/<?= esc($news_item['slug'], 'url') ?>">View article</a></p>




