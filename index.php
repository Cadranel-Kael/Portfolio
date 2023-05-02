<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <div class="hero">
        <svg class="planet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="485 0 716 716">
            <mask id="planet-mask" x="0" y="0" width="1205" height="716" maskUnits="userSpaceOnUse">
                <circle cx="842" cy="357.5" r="357" fill="#5bbac0"/>
            </mask>
            <g mask="url(#planet-mask)">
                <rect class="planet__base" fill="#3ea2a8" y=".91" width="1205" height="715"/>
                <path class="planet__cloud" fill="#37A3AB" d="m231,144C153,174,44.5,131.5,0,106.5V0h1205v106.5s-14.48,23.5-67,23.5c-86.5,0-127.5-39-233.5-58.5-106-19.5-142-27.5-206,0s-150.5,35-242,19.5c-91.5-15.5-128,15.5-225.5,53Z"/>
                <path class="planet__cloud" fill="#158188" d="m0,440.5v-182c40.5,7.5,71.5,64.5,151,64.5,50.25,0,140-97.5,214.5-97.5s96.5,18.5,176,33,146.5,14,203.5,0,63.5-84,142.5-87.5,155,40.5,207.5,75c42,27.6,90.83,19.83,110,12.5v184s-79-19-157.5-67.5c-111.36-68.8-171.92,133.57-254,142.5-119.5,13-231.23-110-337-110s-119.24,102.5-255.5,102.5c-109,0-143.83-55.17-201-69.5Z"/>
                <path class="planet__cloud" fill="#158188" d="m162.5,665c-43.6,7.2-126.5-29.33-162.5-48.5v99.5h1205v-99.5c-19.67,0-67.9,2.4-103.5,12-44.5,12-219.5-55.5-267.5-31s-203,27.5-262,19-152-14.5-206,0-149,39.5-203.5,48.5Z"/>
            </g>
        </svg>

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
        <h2 class="about__title"><?= get_field('about_title') ?></h2>
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
        'posts_per_page' => 4,
    ]);
    if ($projects->have_posts()): while ($projects->have_posts()): $projects->the_post(); ?>
        <article class="projects__project project">
            <div class="project__title-container">
            <h3 class="project__title"><?= get_field('title') ?></h3>
            </div>
            <div class="project__desc"><?= get_field('desc') ?></div>
        </article>
    <?php endwhile; endif; wp_reset_postdata()?>
    </section>
    <section class="faq">
        <h2 class="faq__title"><?= the_field('faq_title', false, false); ?></h2>
        <?php $faqs = get_field('faq'); foreach ($faqs as $faq): ?>
            <article class="faq__question">
                <h3 class="faq__question__title"><?= $faq['question'] ?></h3>
                <p class="faq__question__desc"><?= $faq['answer'] ?></p>
            </article>
        <?php endforeach;?>
    </section>
<?php endwhile; endif; ?>
<?php get_footer();