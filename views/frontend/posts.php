<?php $title = "Les posts" ?>

<?php ob_start(); ?>
<div class="container-fluid">
    <h1>Les posts</h1>
    <div class="row">
        <?php foreach($posts as $post): ?>
            <div class="col-md-4 my-3">
                <div class="card">
                    <div class="card-body">
                        <h5><?= $post->title; ?></h5>
                        <h6><?= $post->getDateFormat(); ?></h6>
                        <h6><?= $post->timeAgo() ?></h6>
                        <div><?= $post->getExtrait(); ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require "base.php"; ?>