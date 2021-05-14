<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Set up Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <!-- Remove Microsoft Edge's & Safari phone-email styling -->
    <meta name="format-detection" content="telephone=no,email=no,url=no">

    <!-- Add external fonts below (GoogleFonts / Typekit) -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
	<?php wp_head(); ?>

    <!-- Facebook Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '286351769764352');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=286351769764352&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
</head>

<body <?php body_class( 'no-outline' ); ?>>
<?php wp_body_open(); ?>

<!-- <div class="preloader hide-for-medium">
	<div class="preloader__icon"></div>
</div> -->

<!-- BEGIN of header -->
<?php if ( ! is_page_template( array(
	"templates/template-home.php",
	"templates/template-pt-landing.php",
	"templates/template-affiliate-landing.php"
) ) ) {
	$header_bg = get_field( "header_bg", "options" );
} ?>
<header id="header"
        class="header rel-wrap" <?php bg( $header_bg ); ?>>
    <div class="grid-container menu-grid-container">
        <div class="grid-x grid-margin-x">
            <div class="header__wrapper cell">
                <div class="header__logo show-for-large">
                    <h1><?php show_custom_logo(); ?><span class="css-clip"><?php echo get_bloginfo( 'name' ); ?></span>
                    </h1>
                </div>
                <div class="header__menu">
					<?php if ( has_nav_menu( 'header-menu' ) ) : ?>
                        <div class="title-bar hide-for-large"
                             data-responsive-toggle="main-menu"
                             data-hide-for="large">
                            <div class="header__logo">
                                <h1><?php show_custom_logo(); ?>
                                    <span class="css-clip"><?php echo get_bloginfo( 'name' ); ?></span>
                                </h1>
                            </div>
                            <button class="menu-icon"
                                    type="button"
                                    data-toggle
                                    aria-label="Menu"
                                    aria-controls="main-menu">
                                <span></span></button>
                        </div>
                        <nav class="top-bar" id="main-menu">
							<?php if ( ! is_page_template( array(
								"templates/template-pt-landing.php",
								"templates/template-affiliate-landing.php",
								"templates/template-pt-page.php",
								"templates/template-affiliate-page.php",
							) ) ) : ?>
								<?php
								$header_flink = get_field( "header_flink", "options" );
								$header_slink = get_field( "header_slink", "options" );
								if ( $header_flink || $header_slink ) : ?>
                                    <div class="header__auth hide-for-large">
										<?php if ( $header_flink ):
											$link_url = $header_flink['url'];
											$link_title = $header_flink['title'];
											$link_target = $header_flink['target'] ? $header_flink['target'] : '_self';
											?>
                                            <a class="button button--outline white small"
                                               href="<?php echo esc_url( $link_url ); ?>"
                                               target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
										<?php endif; ?>
										<?php if ( $header_slink ):
											$link_url = $header_slink['url'];
											$link_title = $header_slink['title'];
											$link_target = $header_slink['target'] ? $header_slink['target'] : '_self';
											?>
                                            <a class="button small"
                                               href="<?php echo esc_url( $link_url ); ?>"
                                               target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
										<?php endif; ?>
                                    </div>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( is_page_template( array(
								"templates/template-pt-landing.php",
								"templates/template-pt-page.php"
							) ) ) {
								$header_menu = 'pt-landing-menu';
							} elseif ( is_page_template( array(
								"templates/template-affiliate-landing.php",
								"templates/template-affiliate-page.php"
							) ) ) {
								$header_menu = 'affiliate-landing-menu';
							} else {
								$header_menu = 'header-menu';
							}

							wp_nav_menu( array(
								'theme_location' => $header_menu,
								'menu_class'     => 'menu header-menu',
								'items_wrap'     => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion large-dropdown" data-submenu-toggle="true" data-multi-open="false" data-close-on-click-inside="false">%3$s</ul>',
								'walker'         => new Foundation_Navigation()
							) ); ?>
                        </nav>
					<?php endif; ?>
                </div>
				<?php if ( ! is_page_template( array(
					"templates/template-pt-landing.php",
					"templates/template-affiliate-landing.php"
				) ) ) : ?>
					<?php
					$header_flink = get_field( "header_flink", "options" );
					$header_slink = get_field( "header_slink", "options" );
					if ( $header_flink || $header_slink ) : ?>
                        <div class="header__auth show-for-large">
							<?php if ( $header_flink ):
								$link_url = $header_flink['url'];
								$link_title = $header_flink['title'];
								$link_target = $header_flink['target'] ? $header_flink['target'] : '_self';
								?>
                                <a class="button button--outline white small"
                                   href="<?php echo esc_url( $link_url ); ?>"
                                   target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
							<?php if ( $header_slink ):
								$link_url = $header_slink['url'];
								$link_title = $header_slink['title'];
								$link_target = $header_slink['target'] ? $header_slink['target'] : '_self';
								?>
                                <a class="button small"
                                   href="<?php echo esc_url( $link_url ); ?>"
                                   target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
                        </div>
					<?php endif; ?>
				<?php endif; ?>
            </div>
        </div>
    </div>
</header>

<?php if ( ! is_page_template( array(
	"templates/template-home.php",
	"templates/template-pt-landing.php",
	"templates/template-affiliate-landing.php"
) ) ) : ?>
    <section class="header__substrate"></section>
<?php endif; ?>
<!-- END of header -->
