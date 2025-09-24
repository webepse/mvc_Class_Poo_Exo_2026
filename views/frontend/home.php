<?php $title = "Accueil"; ?>

<?php ob_start(); ?>

<?php var_dump($posts); ?>

<?php $content = ob_get_clean(); ?>

<?php require "base.php"; ?>

