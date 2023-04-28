<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/styles.min.css'; ?>">
    <title><?= get_bloginfo('name'); ?></title>
</head>
<body>
<div class="maintenance">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <h1><?= get_field('main_title') ?></h1>
    <?php endwhile; else: ?>
        <h1><?= get_the_title(); ?></h1>
    <?php endif; ?>
    <?php if (have_posts()): while (have_posts()):
    the_post(); ?>
    <p><?= get_field('desc'); ?></p>
    <p><?= get_field('desc'); ?></p>
</div>
<?php endwhile;
endif; ?>
</body>