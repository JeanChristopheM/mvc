<?php 
require 'View/includes/header.php';
?>

<section>
    <div class="limit">
        <div class="controls">
            <a href="/article/<?= (isset($IDS[$currentIndex - 1])) ? $IDS[$currentIndex - 1]['ID'] : $IDS[array_key_last($IDS)]['ID'] ?>">Prev</a>
            <h1 style="text-align: center;"><?= $article->getTitle() ?></h1>
            <a href="/article/<?= (isset($IDS[$currentIndex + 1])) ? $IDS[$currentIndex + 1]['ID'] : $IDS[array_key_first($IDS)]['ID'] ?>">Next</a>
        </div>
        <p style="text-align: center;font-size: .8rem">By <?= $article->getAuthor() ?> the <?= $article->formatPublishDate() ?></p>
        <br />
        <p><?= $article->getDescription() ?></p>
    </div>
</section>

<?php require 'View/includes/footer.php'?>