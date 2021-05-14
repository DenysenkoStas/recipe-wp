<?php
/**
 * Template Name: Affiliate Landing
 */
get_header(); ?>

<?php
$main_title    = get_field( "main_title" );
$main_subtitle = get_field( "main_subtitle" );
$main_link     = get_field( "main_link" );
$main_bg       = get_field( 'main_bg' );
if ( $main_title || $main_subtitle || $main_link ) : ?>
    <section class="main-section section-padding rel-wrap ease-top" data-scroll>
		<?php if ( $main_bg ) {
			echo wp_get_attachment_image( $main_bg, "full", false, array( "class" => "main-section__bg stretched-img" ) );
		} ?>
        <div class="main-section__container main-section__container--wider rel-content grid-container align-center">
            <div class="grid-x">
                <div class="text-center cell">
					<?php if ( $main_title ) : ?>
                        <h1 class="main-section__title"><?php echo $main_title; ?></h1>
					<?php endif; ?>
					<?php if ( $main_subtitle ) : ?>
                        <div class="main-section__subtitle"><?php echo $main_subtitle; ?></div>
					<?php endif; ?>
					<?php if ( $main_link ):
						$link_url = $main_link['url'];
						$link_title = $main_link['title'];
						$link_target = $main_link['target'] ? $main_link['target'] : '_self';
						?>
                        <a class="button"
                           href="<?php echo esc_url( $link_url ); ?>"
                           target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
$twb_title  = get_field( "twb_title" );
$twb_anchor = get_field( "twb_anchor" );
$twb_text   = get_field( "twb_text" );
$twb_bg     = get_field( "twb_bg" );
if ( $twb_title && $twb_text ) : ?>
	<?php if ( $twb_anchor ) : ?>
        <div id="<?php echo $twb_anchor; ?>" class="anchor"></div>
	<?php endif; ?>
    <section class="twb-section section-padding rel-wrap ease-btm" data-scroll>
		<?php if ( $twb_bg ) {
			echo wp_get_attachment_image( $twb_bg, "full", false, array( "class" => "twb-section__bg stretched-img" ) );
		} ?>
        <div class="twb-section__container rel-content grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell">
                    <h2 class="twb-section__title section-title"><?php echo $twb_title; ?></h2>
                    <div class="twb-section__text">
						<?php echo $twb_text; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
$features_anchor   = get_field( "features_anchor" );
$features_title    = get_field( "features_title" );
$features_text     = get_field( "features_text" );
$features_video    = get_field( "features_video" );
$features_text_btm = get_field( "features_text_btm" );
if ( $features_video || $features_text ) : ?>
	<?php if ( $features_anchor ) : ?>
        <div id="<?php echo $features_anchor; ?>" class="anchor"></div>
	<?php endif; ?>
    <section class="features-section section-padding grid-x ease-left" data-scroll>
		<?php if ( $features_title ) : ?>
            <h2 class="features-section__title section-title large-6 cell"><?php echo $features_title; ?></h2>
            <div class="large-6 cell"></div>
		<?php endif; ?>
		<?php if ( $features_text ) : ?>
            <div class="large-6 cell">
                <div class="features-section__text">
					<?php echo $features_text; ?>
                </div>
            </div>
		<?php endif; ?>
		<?php if ( $features_video ) : ?>
            <div class="features-section__video large-6 cell">
                <div class="embed-container">
					<?php echo $features_video; ?>
                </div>
            </div>
		<?php endif; ?>
		<?php if ( $features_text_btm ) : ?>
            <div class="grid-container features-section__text-btm cell">
				<?php echo $features_text_btm; ?>
            </div>
		<?php endif; ?>
    </section>
<?php endif; ?>

<?php
$form_title  = get_field( "form_title" );
$form_anchor = get_field( "form_anchor" );
$form_desc   = get_field( "form_desc" );
$form_form   = get_field( "form_form" );
$form_bg     = get_field( "form_bg" );
if ( $form_form ) : ?>
	<?php if ( $form_anchor ) : ?>
        <div id="<?php echo $form_anchor; ?>" class="anchor"></div>
	<?php endif; ?>
    <section class="form-section section-padding rel-wrap fade-in" data-scroll>
		<?php if ( $form_bg ) {
			echo wp_get_attachment_image( $form_bg, "full", false, array( "class" => "form-section__bg stretched-img" ) );
		} ?>
        <div class="form-section__container grid-container rel-content">
			<?php if ( $form_title ) : ?>
                <h2 class="form-section__title section-title text-center"><?php echo $form_title; ?></h2>
			<?php endif; ?>
			<?php if ( $form_desc ) : ?>
                <div class="form-section__desc text-center">
					<?php echo $form_desc; ?>
                </div>
			<?php endif; ?>
            <div class="form-section__form">
				<?php echo do_shortcode( '[gravityform id="' . $form_form[ id ] . '" title="false" description="false" ajax="true"]' ); ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php
$cta_title  = get_field( "cta_title" );
$cta_anchor = get_field( "cta_anchor" );
$cta_desc   = get_field( "cta_desc" );
$cta_link   = get_field( "cta_link" );
$cta_bg     = get_field( "cta_bg" );
if ( $cta_title || $cta_desc || $cta_link ) : ?>
	<?php if ( $cta_anchor ) : ?>
        <div id="<?php echo $cta_anchor; ?>" class="anchor"></div>
	<?php endif; ?>
    <section class="cta-section section-padding rel-wrap ease-btm" data-scroll>
		<?php if ( $cta_bg ) {
			echo wp_get_attachment_image( $cta_bg, "full", false, array( "class" => "cta-section__bg stretched-img" ) );
		} ?>
        <div class="grid-container text-center rel-content">
            <div class="grid-x">
                <div class="cell">
					<?php if ( $cta_title ) : ?>
                        <h2 class="cta-section__title section-title"><?php echo $cta_title; ?></h2>
					<?php endif; ?>
					<?php if ( $cta_desc ) : ?>
                        <div class="cta-section__desc">
							<?php echo $cta_desc; ?>
                        </div>
					<?php endif; ?>
					<?php if ( $cta_link ):
						$link_url = $cta_link['url'];
						$link_title = $cta_link['title'];
						$link_target = $cta_link['target'] ? $cta_link['target'] : '_self';
						?>
                        <a class="cta-section__btn button"
                           href="<?php echo esc_url( $link_url ); ?>"
                           target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>