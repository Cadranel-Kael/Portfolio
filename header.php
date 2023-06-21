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
<body>
<?php include_once "custom-mouse.php" ?>
<div class="sr-only">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <h1><?= get_field('page_title') ?></h1>
    <?php endwhile; else: ?>
    <h1><?= get_the_title(); ?></h1>
    <?php endif; ?>
</div>
<nav class="nav">
    <h2 class="nav__title sr-only">Navigation menu</h2>
    <ul class="nav__list">
        <li>
            <a title="back to the main page" href="<?= get_home_url(); ?>" class="nav__link">Kael Cadranel</a>
        </li>
    <?php foreach(kc_get_menu('main') as $link): ?>
        <li class="nav__item dt-only">
            <a href="<?= $link->href; ?>" class="nav__link"><?= $link->label; ?></a>
        </li>
    <?php endforeach; ?>
        <li class="nav_item burger-menu">
            <label for="burger-menu" class="sr-only">burger menu</label>
            <input type="checkbox" name="menu" id="burger-menu" class="burger-menu__checkbox clickable" aria-expanded="false">
            <div class="burger-menu__icon">
                <div></div>
            </div>
            <nav class="burger-menu__nav">
                <a class="burger-menu__nav__language" href="#" hreflang="fr">FR</a>
                <div class="burger-menu__nav__container">
                    <h3 class="burger-menu__nav__container__title"><a href="<?= get_home_url(); ?>">Kael Cadranel</a></h3>
                    <ul>
                    <?php foreach(kc_get_menu('main') as $link): ?>
                        <li class="nav__item">
                            <a href="<?= $link->href; ?>" class="nav__link"><?= $link->label; ?></a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </nav>
        </li>
    </ul>
</nav>
