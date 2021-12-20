<?php require 'View/includes/header.php'?>


<section>
    <div class="limit">
        <h1 style="text-align: center;">Articles</h1>
        <ul>
            <?php foreach ($articles as $article) : ?>
                <li>
                    <a href="/article/<?= $article->getId() ?>">
                        <?= $article->getTitle() ?>
                    </a> by <?= $article->getAuthor() ?> (<?= $article->formatPublishDate() ?>)
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php require 'View/includes/footer.php'?>