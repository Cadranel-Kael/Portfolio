<footer class="footer">
    <nav class="footer__socials socials">
        <h2 class="socials__title">My socials</h2>
        <div class="socials__items">
            <?php foreach (kc_get_menu('social-media') as $link): ?>
                <li class="socials__item">
                    <a href="<?= $link->href; ?>" class="socials__link"><?= $link->label; ?></a>
                </li>
            <?php endforeach; ?>
        </div>
    </nav>
    <div class="footer__small">
        <small class="footer__small__copyright">
            <span class="footer__small__copyright__row">© 2023</span>
            <span class="footer__small__copyright__row">Kael Cadranel</span>
        </small>
    </div>
</footer>
<script src="<?= get_stylesheet_directory_uri() . '/public/js/main.js' ?>"></script>
</body>
</html>