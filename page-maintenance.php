<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri() . '/apple-touch-icon.png' ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri() . '/favicon-32x32.png' ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri() . '/favicon-16x16.png' ?>">
    <link rel="manifest" href="<?= get_stylesheet_directory_uri() . '/site.webmanifest' ?>">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/main.css'; ?>">
    <title><?= get_bloginfo('name'); ?> – <?= get_the_title(); ?></title>
</head>
<body class="maintenance">
<?php include_once "custom-mouse.php" ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <h1 class="maintenance__title"><?= get_field('main_title') ?></h1>
<?php endwhile; else: ?>
    <h1 class="maintenance__title"><?= get_the_title(); ?></h1>
<?php endif; ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <p class="maintenance__desc"><?= get_field('desc'); ?></p>
<?php endwhile; endif; ?>
<script src="<?= get_stylesheet_directory_uri() . '/public/js/main.js' ?>"></script>
</body>