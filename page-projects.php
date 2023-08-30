<?php get_header(); ?>
<body class="projects">
<h2 class="projects__title">Projects</h2>
<?php
$projects = new WP_Query([
    'post_type' => 'project',
]);
if ($projects->have_posts()): while ($projects->have_posts()): $projects->the_post(); ?>
    <article class="projects__project project">
        <?= kc_insert_image(get_field('main_image'), 'medium', array('project__image')); ?>
        <h3 class="project__title"><?= get_field('title') ?></h3>
        <div class="project__desc"><?= get_field('tag') ?></div>
        <a class="project__link" href="<?= get_permalink(); ?>">
            View Case <span class="sr-only">(<?= get_field('title') ?>)</span>
        </a>
    </article>
<?php endwhile; endif;
wp_reset_postdata() ?>
</body>