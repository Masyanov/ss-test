<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ss-test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'ss-test'); ?></a>

    <header>
        <div class="header__container">
            <div class="header__container-site-info">
                <a href="/" title="Hybrid SK">
                    <div class="header__container-site-logo">
                        <?php echo carbon_get_theme_option('logo') ?>
                    </div>
                </a>
                <div class="header__container-adress">
                    <svg width="18" height="23" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5625 6.02691C16.7201 3.37778 14.5321 1.23029 11.8522 0.422373C8.99839 -0.437926 6.02325 0.0290817 3.68969 1.70363C2.57154 2.50598 1.64371 3.5643 1.00656 4.76402C0.348041 6.004 0 7.39999 0 8.80115C0 10.7125 0.621093 12.5289 1.79618 14.0539L9.00093 23L16.1967 14.0653L16.2057 14.0539C17.9642 11.7715 18.4588 8.84571 17.5625 6.02691ZM15.1022 13.2396L9.00093 20.8159L2.89965 13.2396C1.90864 11.9508 1.38478 10.4161 1.38478 8.80115C1.38478 6.44127 2.55359 4.19361 4.51138 2.78872C6.48712 1.37094 9.01344 0.977831 11.4426 1.71006C13.6923 2.38829 15.5305 4.19513 16.2397 6.42546C17.0024 8.82437 16.5878 11.3077 15.1022 13.2396Z"
                              fill="#0CAE49"/>
                        <path d="M9.00289 4.08203C6.33047 4.08203 4.15625 6.19852 4.15625 8.79999C4.15625 11.4015 6.33047 13.518 9.00289 13.518C11.6753 13.518 13.8495 11.4015 13.8495 8.79999C13.8495 6.19852 11.6753 4.08203 9.00289 4.08203ZM9.00289 12.17C7.09402 12.17 5.54098 10.6582 5.54098 8.79999C5.54098 6.9418 7.09397 5.43 9.00289 5.43C10.9118 5.43 12.4648 6.94176 12.4648 8.79999C12.4648 10.6582 10.9118 12.17 9.00289 12.17Z"
                              fill="#0CAE49"/>
                    </svg>
                    <span><?php echo carbon_get_theme_option('adress') ?></span>
                </div>
            </div>
            <nav id="site-navigation" class="header__container-main-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id' => 'primary-menu',
                    )
                );
                ?>
            </nav>
            <div class="header__container-site-info">
                <div class="header__container-site-contacts">
                    <a class="header__container-tel" href="tel:<?php echo carbon_get_theme_option('tel') ?>"><?php echo carbon_get_theme_option('tel') ?></a>
                    <button class="header__container-btn" data-fancybox="" data-src="#modal-form"><span>Заказать звонок</span></button>
                </div>
                <a class="header__container-tel-mob" href="tel:<?php echo carbon_get_theme_option('tel') ?>">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.374 20C13.7284 20 13.0883 19.8859 12.4623 19.6585C9.70467 18.6567 7.145 17.0251 5.05992 14.9401C2.97484 12.8551 1.34325 10.2954 0.341533 7.53774C0.0196307 6.65152 -0.0753659 5.73672 0.0592776 4.81863C0.185406 3.95867 0.518519 3.12382 1.02264 2.40432C1.52899 1.68165 2.20404 1.08058 2.9748 0.666105C3.79672 0.224131 4.69384 0 5.6413 0C5.93598 0 6.19066 0.20589 6.25241 0.494003L7.23339 5.0719C7.27781 5.2792 7.2141 5.49489 7.06422 5.64481L5.38799 7.32099C6.96926 10.4648 9.53511 13.0307 12.679 14.6119L14.3552 12.9357C14.5051 12.7858 14.7208 12.7222 14.9281 12.7665L19.506 13.7475C19.7941 13.8093 20 14.064 20 14.3586C20 15.3061 19.7759 16.2032 19.3339 17.0252C18.9194 17.7959 18.3183 18.471 17.5956 18.9773C16.8762 19.4814 16.0413 19.8145 15.1813 19.9407C14.9118 19.9802 14.6424 20 14.374 20ZM5.14194 1.27729C3.89219 1.41525 2.78293 2.07031 2.04631 3.12163C1.21799 4.30381 1.02483 5.75785 1.51637 7.111C3.44224 12.4126 7.58744 16.5578 12.889 18.4836C14.2422 18.9752 15.6962 18.782 16.8784 17.9537C17.9298 17.2171 18.5848 16.1078 18.7228 14.8581L14.9987 14.06L13.2481 15.8106C13.0618 15.9969 12.7788 16.0464 12.5404 15.9343C8.8222 14.1875 5.81247 11.1778 4.06566 7.45962C3.95367 7.22123 4.00312 6.93819 4.1894 6.75195L5.93996 5.0014L5.14194 1.27729Z" fill="#3A3A3A"/>
                    </svg>
                </a>

                <div class="header__container-cart">
                    <a href="/cart/">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.6954 1.28112H15.6291V0H6.3703V1.28107H3.304L1.73835 7.80095H0V12.2422H1.3307L2.81347 22H19.1858L20.6687 12.2422H21.9993V7.80099H20.261L18.6954 1.28112ZM7.65932 1.28902H14.34V2.56215H7.65932V1.28902ZM4.32013 2.5701H6.37034V3.85117H15.6291V2.5701H17.6793L18.9354 7.80095H3.06402L4.32013 2.5701ZM18.0779 20.711H3.92142L2.63451 12.2422H19.3648L18.0779 20.711ZM20.7103 10.9532H1.28902V9.09001H20.7103V10.9532Z"
                                  fill="#3A3A3A"/>
                            <path d="M11.6445 14.0234H10.3555V18.9286H11.6445V14.0234Z" fill="#3A3A3A"/>
                            <path d="M7.45309 14.0234H6.16406V18.9286H7.45309V14.0234Z" fill="#3A3A3A"/>
                            <path d="M15.8359 14.0234H14.5469V18.9286H15.8359V14.0234Z" fill="#3A3A3A"/>
                        </svg>
                    </a>
                    <span class="count"><?php echo wp_kses_data(sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count(), 'storefront'), WC()->cart->get_cart_contents_count())); ?></span>
                </div>
                <input type="checkbox" id="hmt" class="hidden-menu-ticker">

                <label class="btn-menu" for="hmt">
                    <span class="first"></span>
                    <span class="second"></span>
                    <span class="third"></span>
                </label>
                <div class="hidden-menu">
                        <nav id="site-navigation" class="header__container-main-navigation-mob">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'menu_id' => 'primary-menu',
                                )
                            );
                            ?>
                        </nav>
                        <a class="header__container-tel" href="tel:<?php echo carbon_get_theme_option('tel') ?>">
                            <?php echo carbon_get_theme_option('tel') ?></a>
                    </div>
            </div>




        </div>
    </header>
    <script>
        jQuery(document).ready(function($) {
            var url=document.location.href;
            $.each($(".menu a"),function(){
                if(this.href==url){$(this).addClass('active-link');};
            });
        })(jQuery);
    </script>