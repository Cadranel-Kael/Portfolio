<!DOCTYPE html>
<html lang="en" itemscope itemtype="https://schema.org/Person">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kael Cadranel">
    <meta name="description" content="Kael Cadranel's web portfolio.">
    <meta name="keywords" content="web, full-stack, developer, designer, web design">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri() . '/apple-touch-icon.png' ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri() . '/favicon-32x32.png' ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri() . '/favicon-16x16.png' ?>">
    <link rel="manifest" href="<?= get_stylesheet_directory_uri() . '/site.webmanifest' ?>">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/main.css'; ?>">
    <title><?= get_bloginfo('name'); ?> – <?= get_the_title(); ?></title>
</head>
<body>
<header>
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
                <a title="back to the main page" href="<?= get_home_url(); ?>" class="nav__link nav__logo">Kael Cadranel</a>
            </li>
            <?php foreach(kc_get_menu('main') as $link): ?>
                <li class="nav__item dt-only">
                    <a href="<?= $link->href; ?>" class="nav__link"><?= $link->label; ?></a>
                </li>
            <?php endforeach; ?>
            <li class="nav_item burger-menu">
                <label for="burger-menu" class="sr-only">burger menu</label>
                <input type="checkbox" name="menu" id="burger-menu" role="button" class="burger-menu__checkbox clickable" aria-expanded="false">
                <div class="burger-menu__icon">
                    <div></div>
                </div>
                <div class="burger-menu__nav">
                    <a class="burger-menu__nav__language" href="#" hreflang="fr">FR</a>
                    <div class="burger-menu__nav__container">
                        <a class="burger-menu__nav__container__title" href="<?= get_home_url(); ?>">Kael Cadranel</a>
                        <ul>
                            <?php foreach(kc_get_menu('main') as $link): ?>
                                <li class="nav__item">
                                    <a href="<?= $link->href; ?>" class="nav__link"><?= $link->label; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</header>