<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/styles.min.css'; ?>">
    <title><?= get_bloginfo('name'); ?></title>
</head>
<body>
<div class="sr-only">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <h1><?= get_field('main_title') ?></h1>
    <?php endwhile; else: ?>
    <h1><?= get_the_title(); ?></h1>
    <?php endif; ?>
</div>
<nav class="nav">
    <h2 class="nav__title sr-only">Navigation menu</h2>
    <ul class="nav__list">
        <li>
            <a href="<?= get_home_url(); ?>" class="nav__link">Kael Cadranel</a>
        </li>
    <?php foreach(kc_get_menu('main') as $link): ?>
        <li class="nav__item">
            <a href="<?= $link->href; ?>" class="nav__link"><?= $link->label; ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
</nav>