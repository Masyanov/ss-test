<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ss-test
 */

?>

<footer>
    <div class="footer__container">
        <div class="footer__top">
            <div class="footer__top-left">
                <a href="/" title="Hybrid SK">
                    <div class="header__container-site-logo">
                        <?php echo carbon_get_theme_option('logo') ?>
                    </div>
                </a>
                <span class="footer__top-text"><?php echo carbon_get_theme_option('text-one') ?></span>
            </div>
            <div class="footer__top-right">
                <span class="footer__top-text"><?php echo carbon_get_theme_option('text-two') ?></span>
                <? echo do_shortcode(carbon_get_theme_option('short')); ?>
            </div>
        </div>
        <div class="footer__bottom">
            <span class="footer__bottom-copy">© 2022 HYBRID SK. Все права защищены.</span>
            <span class="footer__bottom-production">Разработано в
                <a href="https://stebnev-studio.ru/" class="footer__bottom-production-stebnev">Stebnev-Studio</a>
            </span>
        </div>

    </div>
</footer>


</div>
<div id="modal-form" class="modal-payment"
     style="display:none;">
    <h2>Заказать звонок</h2>
    <? echo do_shortcode(carbon_get_theme_option('short-header')); ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<?php wp_footer(); ?>

</body>
</html>
