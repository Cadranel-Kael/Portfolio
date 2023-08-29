<?php get_header(); ?>
<?php include_once 'partials/fields.php' ?>
    <main class="project">
        <img class="star-bg" id="bg-stars-1" src="<?= get_stylesheet_directory_uri() . '/public/images/stars_layer_1.svg' ?>" alt="">
        <img class="star-bg" id="bg-stars-2" src="<?= get_stylesheet_directory_uri() . '/public/images/stars_layer_3.png' ?>" alt="">
        <section class="project__head head">
            <h2 class="head__title"><?= $title ?></h2>
            <span class="head__tag"><?= $tag ?></span>
            <p class="head__desc"><?= $desc ?></p>
        </section>
        <section class="project__objectives objectives">
            <h2 class="objectives__title"><?= __kc("::star-black::Objectives and goals::star-black::") ?></h2>
            <ul class="objectives__list list">
                <?php foreach ($objectives as $objective): ?>
                    <li class="list__item"><?= $objective['objective'] ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section class="project__overview overview">
            <h2 class="overview__title">Project overview</h2>
            <ul class="overview__list list">
                <?php foreach ($overviews as $overview): ?>
                    <li class="list__item">
                        <h3 class="list__item__title"><?= $overview['overview_title'] ?></h3>
                        <p class="list__item__desc"><?= $overview['overview_desc'] ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

    </main>
<?php get_footer();
