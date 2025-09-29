<?php $title = $post->title; ?>

<?php ob_start(); ?>

<div class="container-fluid">
    <h2><?= $post->title ?></h2>
    <h6><?= $post->getDateFormat() ?></h6>
    <div>
        <?= nl2br($post->content) ?>
    </div>
    <div>
        <h4>Les commentaires</h4>
        <?php
            if($comments &&count($comments) > 0):
                foreach($comments as $comment):
        ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $comment->author ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $comment->mydate ?></h6>
                        <p class="card-text"><?= $comment->comment ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <strong>Il n'y a pas encore de commentaire sur ce post</strong>
            <?php endif; ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require "base.php"; ?>