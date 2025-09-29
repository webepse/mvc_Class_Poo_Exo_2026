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
                        <p class="card-text"><?= nl2br($comment->comment) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <strong>Il n'y a pas encore de commentaire sur ce post</strong>
            <?php endif; ?>

        <div class="col-md-4">
            <h4>Ajouter un commentaire</h4>
            <?php if(isset($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            <form action="index.php?action=postcomment&id=<?= $post->id ?>" method="post">
                <div class="form-group">
                    <label for="author">Auteur</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Auteur">
                </div>
                <div class="form-group">
                    <label for="comment">Commentaire</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Envoyer" class="btn btn-primary my-3">
                </div>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require "base.php"; ?>