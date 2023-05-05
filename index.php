<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <div class="hero">
        <?php include_once "planet.php" ?>
        <div class="hero__pre"><?= get_field('pre') ?></div>
        <h2 class="hero__title">
            <?php
            $main_title = explode(' ', get_field('main_title'));
            foreach ($main_title as $word):
                ?>
                <span class="hero__title__word"><?= $word; ?></span>
            <?php endforeach; ?>
        </h2>
        <div class="hero__tagline"><?= get_field('tagline') ?></div>
        <svg class="hero__arrow" role="img" width="68.93" height="52">
            <use xlink:href="<?= get_stylesheet_directory_uri() . '/public/images/sprite.svg#arrow' ?>"/>
        </svg>
    </div>
    <section class="about">
        <h2 class="about__title">
            <?php
            $sprite = '<svg role="img" width="28" height="28"><use xlink:href="' . get_stylesheet_directory_uri() . '/public/images/sprite.svg#star--black"></use></svg>';
            $title = get_field('about_title');
            $replace = str_replace("<br>", $sprite, $title);
            echo $replace;
            ?>
        </h2>
        <div class="about__img-container">
            <?= wp_get_attachment_image(get_field('about_img'), ['169', '247'], '', ['class' => 'about__img-container__img']); ?>
        </div>
        <p class="about__desc"><?= get_field('about_desc') ?></p>
    </section>
    <svg class="about__separator" role="img" width="390" height="44.5">
        <use xlink:href="<?= get_stylesheet_directory_uri() . '/public/images/sprite.svg#separator-about"' ?>"/>
    </svg>
    <section class="projects">
        <h2 class="projects__title"><?= get_field('projects_title') ?></h2>
        <?php
        $projects = new WP_Query([
            'post_type' => 'projects',
            'posts_per_page' => 3,
        ]);
        if ($projects->have_posts()): while ($projects->have_posts()): $projects->the_post(); ?>
            <article class="projects__project project">
                <div class="project__title-container">
                    <h3 class="project__title"><?= get_field('title') ?></h3>
                </div>
                <div class="project__desc"><?= get_field('desc') ?></div>
                <a class="project__link" href="<?= get_permalink(); ?>">Go to <?= get_field('title') ?></a>
            </article>
        <?php endwhile; endif;
        wp_reset_postdata() ?>
    </section>
    <section class="faq">
        <h2 class="faq__title"><?= the_field('faq_title', false, false); ?></h2>
        <?php $faqs = get_field('faq');
        foreach ($faqs as $faq): ?>
            <article class="faq__question">
                <h3 class="faq__question__title"><?= $faq['question'] ?></h3>
                <p class="faq__question__desc"><?= $faq['answer'] ?></p>
            </article>
        <?php endforeach; ?>
    </section>
<?php endwhile; endif; ?>
<?php get_footer();