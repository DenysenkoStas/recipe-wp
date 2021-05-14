<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer">
    <div class="grid-container">
        <div class="grid-x grid-margin-x">
			<?php if ( $footer_logo = get_field( 'footer_logo', 'options' ) ): ?>
                <div class="footer__logo medium-6 cell">
					<?php echo wp_get_attachment_image( $footer_logo['id'], 'medium' ); ?>
                </div>
			<?php else: ?>
                <div class="footer__logo medium-6 cell">
					<?php show_custom_logo(); ?>
                </div>
			<?php endif; ?>
			<?php if ( ! is_page_template( array(
				"templates/template-pt-landing.php",
				"templates/template-pt-page.php"
			) ) ) : ?>
				<?php if ( $footer_link = get_field( 'footer_link', 'options' ) ):
					$link_url = $footer_link['url'];
					$link_title = $footer_link['title'];
					$link_target = $footer_link['target'] ? $footer_link['target'] : '_self';
					?>
                    <div class="footer__link medium-6 cell text-right">
                        <a class="button button--outline white small"
                           href="<?php echo esc_url( $link_url ); ?>"
                           target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    </div>
				<?php endif; ?>
			<?php endif; ?>
            <hr class="footer__divider cell">
			<?php if ( $copyright = get_field( 'copyright', 'options' ) ): ?>
                <div class="footer__copy large-4 cell">
					<?php echo $copyright; ?>
                </div>
			<?php endif; ?>
            <div class="large-8 cell">
				<?php if ( is_page_template( array(
					"templates/template-pt-landing.php",
					"templates/template-pt-page.php"
				) ) ) {
					$footer_menu = 'pt-footer-menu';
				} elseif ( is_page_template( array(
					"templates/template-affiliate-landing.php",
					"templates/template-affiliate-page.php"
				) ) ) {
					$footer_menu = 'affiliate-footer-menu';
				} else {
					$footer_menu = 'footer-menu';
				}

				wp_nav_menu( array(
					'theme_location' => $footer_menu,
					'menu_class'     => 'footer__menu',
					'depth'          => 1
				) ); ?>
            </div>
        </div>
    </div>
</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
