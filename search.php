<?= get_header() ?>
<section class="search">
    <h2 class="search__head">Résultats de recherche pour <em><?= get_search_query(); ?></em></h2>
    <?php if(have_posts()):while(have_posts()):the_post(); ?>
    <article class="search__result">
        <h3 class="search__title"><?= get_the_title(); ?></h3>
        <div class="search__excerpt"><?= get_the_excerpt(); ?></div>
        <a href="<?= get_the_permalink(); ?>" class="search__link">Voir la page de <?= get_the_title(); ?></a>
    </article>
    <?php endwhile; else: ?>

    <?php endif; ?>
</section>
<?= get_footer() ?>
