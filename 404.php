<?php get_header(); ?>
<main class="error404">
    <h1 class="error404__title"><?= __hepl('Page non trouvée') ?></h1>
    <p class="error404__help"><?= __hepl('Vous êtes perdu&nbsp;?') ?> <a href="<?= get_home_url()?>"><?= __hepl('Retournez à l\'accueil') ?></a></p>
</main>
