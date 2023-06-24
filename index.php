<?php get_header(); ?>
<?php include_once 'partials/fields.php' ?>
<?php if (isset($_POST['contact_form'])) {
    extract($_SESSION['acf_fields']);
} ?>
<main class="front">
    <canvas id="canvas-bg" class="canvas-bg"></canvas>
    <section class="front__hero hero">
        <?php get_template_part('planet'); ?>
        <div class="hero__pre"><?= $pre ?></div>
        <h2 class="hero__title" itemprop="name">
            <?= word_per_line($main_title) ?>
        </h2>
        <div class="hero__tagline"><?= $tagline ?></div>
        <a href="#about">
            <svg class="hero__arrow" role="img" width="68.93" height="52">
                <use xlink:href="<?= get_stylesheet_directory_uri() . '/public/images/sprite.svg#arrow' ?>"/>
            </svg>
        </a>
    </section>
    <section class="front__about about" id="about">
        <h2 class="about__title">
            <?= __kc($about_title); ?>
        </h2>
        <div class="about__img-container">
            <?= wp_get_attachment_image($about_img, ['169', '247'], '', ['class' => 'about__img-container__img']); ?>
        </div>
        <p class="about__desc"><?= $about_desc ?></p>
    </section>
    <svg class="separator separator--translate-up" role="img" width="390" height="44.5">
        <use xlink:href="<?= get_stylesheet_directory_uri() . '/public/images/sprite.svg#separator-1"' ?>"/>
    </svg>
    <section class="front__projects projects">
        <h2 class="projects__title"><?= __kc($projects_title); ?></h2>
        <?php
        $projects = new WP_Query([
            'post_type' => 'projects',
            'posts_per_page' => 3,
        ]);
        if ($projects->have_posts()): while ($projects->have_posts()): $projects->the_post(); ?>
            <article class="projects__project project">
                <h3 class="project__title"><?= get_field('title') ?></h3>
                <div class="project__desc"><?= get_field('desc') ?></div>
                <a class="project__link" href="<?= get_permalink(); ?>">
                    <span>Check it out <span class="sr-only">(<?= get_field('title') ?>)</span></span>
                    <svg class="project__arrow" role="img" width="25" height="19">
                        <use stroke-width="3px"
                             xlink:href="<?= get_stylesheet_directory_uri() . '/public/images/sprite.svg#arrow"' ?>"/>
                    </svg>
                </a>
            </article>
        <?php endwhile; endif;
        wp_reset_postdata() ?>
        <a href="#" class="projects__link">
            See more
            <svg class="project__arrow" role="img" width="37" height="28">
                <use stroke="#fff" stroke-width="3px"
                     xlink:href="<?= get_stylesheet_directory_uri() . '/public/images/sprite.svg#arrow"' ?>"/>
            </svg>
        </a>
        <svg class="separator separator--bottom separator--translate-down" role="img" width="390" height="77">
            <use xlink:href="<?= get_stylesheet_directory_uri() . '/public/images/sprite.svg#separator-2"' ?>"/>
        </svg>
    </section>
    <section class="front__qualifications qualifications">
        <h2 class="qualifications__title"><?= __kc($qualifications_title) ?></h2>
        <?php $qualifications = $qualification;
        foreach ($qualifications as $qualification): ?>
            <article class="qualifications__qualification">
                <div class="qualifications__qualification__row">
                    <h3 class="qualifications__qualification__title"><?= $qualification['title'] ?></h3>
                    <p class="qualifications__qualification__year"><?= $qualification['year'] ?></p>
                </div>
                <p class="qualifications__qualification__school"><?= $qualification['school'] ?>,</p>
                <p class="qualifications__qualification__location"><?= $qualification['location'] ?></p>
            </article>
        <?php endforeach; ?>
    </section>
    <svg class="separator separator--translate-up" role="img" width="390" height="33">
        <use xlink:href="<?= get_stylesheet_directory_uri() . '/public/images/sprite.svg#separator-3"' ?>"/>
    </svg>
    <section class="front__faq faq">
        <h2 class="faq__title"><?= the_field('faq_title', false, false); ?></h2>
        <?php $faqs = $faq;
        $number = 0;
        foreach ($faqs as $faq):?>
            <article class="faq__container">
                <span class="faq__star"><?= kc_star(20) ?></span>
                <div class="faq__q-and-a">
                    <h3 class="faq__question clickable drop-down--question"><?= $faq['question'] ?></h3>
                    <p class="faq__answer js--sr-only drop-down--answer clickable" aria-expanded="true"><?= $faq['answer'] ?></p>
                </div>
                <span class="faq__arrow clickable drop-down--button">
                        <svg role="img" width="22" height="29">
                            <use
                                xlink:href="<?= get_stylesheet_directory_uri() . '/public/images/sprite.svg#simple-arrow"' ?>"/>
                        </svg>
                </span>
            </article>
        <?php endforeach; ?>
    </section>
    <svg class="separator separator--relative separator--translate-down" role="img" width="390" height="31">
        <use xlink:href="<?= get_stylesheet_directory_uri() . '/public/images/sprite.svg#separator-4"' ?>"/>
    </svg>
    <section class="front__contact contact">
        <h2 class="contact__title"><?= $contact_title ?></h2>
        <?php include_once 'partials/contact-form.php'; ?>
        <svg class="separator separator--translate-up" role="img" width="390" height="38">
            <use xlink:href="<?= get_stylesheet_directory_uri() . '/public/images/sprite.svg#separator-5"' ?>"/>
        </svg>
    </section>
</main>
<?php get_footer();