<?php get_header(); ?>
<?php include_once 'partials/fields.php' ?>
    <main class="project">
        <section class="project__head head">
            <h2 class="head__title"><?= $title ?></h2>
            <span class="head__tag"><?= $tag ?></span>
            <p class="head__desc"><?= $desc ?></p>
        </section>
        <section class="project__objectives objectives">
            <h2 class="objectives__title">Objectives and goals</h2>
            <ul class="objectives__list list">
                <?php foreach ($objectives as $objective): ?>
                    <li class="list__item"><?= $objective['objective'] ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section class="project__persona persona">
            <h2 class="persona__title">User personas</h2>
            <?php foreach ($personas as $persona): ?>
            <article class="persona__item item">
                <h3 class="item__title"><?= $persona['type'] ?></h3>
                <div class="item__info">
                    <span class="item__info__name">Name: <?= $persona['name'] ?></span>
                    <span class="item__info__name">Age: <?= $persona['age'] ?></span>
                    <span class="item__info__name">Location: <?= $persona['location'] ?></span>
                    <span class="item__info__name">Occupation: <?= $persona['occupation'] ?></span>
                </div>
                <div class="item__goals">
                    <h4 class="item__goals__title">Goals & need</h4>
                    <ul class="item__goals__list">
                        <?php foreach ($persona['goals'] as $goal): ?>
                        <li class="item__goals__list__item"><?= $goal['goal'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="item__interactions">
                    <h4 class="item__interactions__title">Web interactions</h4>
                    <ul class="item__interactions__list">
                        <?php foreach ($persona['interactions'] as $interaction): ?>
                            <li class="item__interactions__list__item"><?= $interaction['interaction'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </article>
            <?php endforeach; ?>
        </section>
    </main>
<?php get_footer();
