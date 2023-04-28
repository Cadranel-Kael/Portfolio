<?php get_header(); ?>
<?php if (have_posts()): while(have_posts()): the_post(); ?>
<?php endWhile; endif; ?>
<main class="animal">
    <h1 class="animal__title"><?= get_the_title() ?></h1>
    <dl class="animal__attributes">
        <dt class="animal__key"><?= __hepl('Espèce') ?></dt>
        <dd class="animal__attributes"><?= __hepl(get_field('species')) ?></dd>
        <dt class="animal__key"><?= __hepl('Âge') ?></dt>
        <dd class="animal__attributes"><?= get_field('age') ?></dd>
        <dt class="animal__key"><?= __hepl('Sexe') ?></dt>
        <dd class="animal__attributes"><?= __hepl(get_field('gender')) ?></dd>
    </dl>
</main>
<?php get_footer(); ?>
