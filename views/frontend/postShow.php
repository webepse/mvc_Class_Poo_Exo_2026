<?php $title = $post->title; ?>

<?php ob_start(); ?>

<div class="container-fluid">
    <h2><?= $post->title ?></h2>
    <h6><?= $post->getDateFormat() ?></h6>
    <div>
        <?= nl2br($post->content) ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require "base.php"; ?>