<?php
/**
 * Template Name: PT Landing
 */

get_header(); ?>

<?php
$main_title  = get_field( "main_title" );
$main_anchor = get_field( "main_anchor" );
$main_desc   = get_field( "main_desc" );
$main_form   = get_field( "main_form" );
$main_bg     = get_field( 'main_bg' );
if ( $main_title || $main_desc || $main_form ) : ?>
	<?php if ( $main_anchor ) : ?>
        <div id="<?php echo $main_anchor; ?>" class="anchor"></div>
	<?php endif; ?>
    <section class="main-section section-padding rel-wrap ease-top" data-scroll>
		<?php if ( $main_bg ) {
			echo wp_get_attachment_image( $main_bg, "full", false, array( "class" => "main-section__bg stretched-img" ) );
		} ?>
        <div class="main-section__container grid-container rel-content align-center">
            <div class="grid-x">
                <div class="cell">
					<?php if ( $main_title ) : ?>
                        <h1 class="main-section__title mob-title text-center"><?php echo $main_title; ?></h1>
					<?php endif; ?>
					<?php if ( $main_desc ) : ?>
                        <div class="main-section__desc text-center">
							<?php echo $main_desc; ?>
                        </div>
					<?php endif; ?>
					<?php if ( $main_form ) : ?>
                        <div class="main-section__form main-section__form--margin-top">
							<?php echo do_shortcode( '[gravityform id="' . $main_form[ id ] . '" title="false" description="false" ajax="true"]' ); ?>
                        </div>
					<?php endif; ?>
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
$cc_title          = get_field( "cc_title" );
$cc_anchor         = get_field( "cc_anchor" );
$cc_desc           = get_field( "cc_desc" );
$cc_link           = get_field( "cc_link" );
$cc_bg             = get_field( "cc_bg" );
if ( $cc_title || $twb_text || $cc_link ) : ?>
	<?php if ( $cc_anchor ) : ?>
        <div id="<?php echo $cc_anchor; ?>" class="anchor"></div>
	<?php endif; ?>
    <section class="centered-content section-padding rel-wrap ease-left" data-scroll>>
		<?php if ( $cc_bg ) {
			echo wp_get_attachment_image( $cc_bg, "full", false, array( "class" => "centered-content__bg stretched-img" ) );
		} ?>
        <div class="centered-content__container grid-container text-center rel-content">
            <div class="grid-x grid-margin-x">
                <div class="cell">
					<?php if ( $cc_title ) : ?>
                        <h2 class="centered-content__title section-title"><?php echo $cc_title; ?></h2>
					<?php endif; ?>
					<?php if ( $cc_desc ) : ?>
                        <div class="centered-content__desc">
							<?php echo $cc_desc; ?>
                        </div>
					<?php endif; ?>
					<?php if ( $cc_link ):
						$link_url = $cc_link['url'];
						$link_title = $cc_link['title'];
						$link_target = $cc_link['target'] ? $cc_link['target'] : '_self';
						?>
                        <a class="centered-content__btn button"
                           href="<?php echo esc_url( $link_url ); ?>"
                           target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ( have_rows( "testim_testimonial" ) ) :
	$testim_title = get_field( "testim_title" );
	$testim_anchor = get_field( "testim_anchor" );
	$testim_desc   = get_field( "testim_desc" );
	?>
	<?php if ( $testim_anchor ) : ?>
    <div id="<?php echo $testim_anchor; ?>" class="anchor"></div>
<?php endif; ?>
    <section class="testim-section section-padding grid-container ease-btm" data-scroll>
        <div class="grid-x">
            <div class="cell">
				<?php if ( $testim_title ) : ?>
                    <h2 class="testim-section__title section-title text-center"><?php echo $testim_title; ?></h2>
				<?php endif; ?>
				<?php if ( $testim_desc ) : ?>
                    <div class="testim-section__desc text-center">
						<?php echo $testim_desc; ?>
                    </div>
				<?php endif; ?>
                <div class="testim-section__list">
					<?php while ( have_rows( 'testim_testimonial' ) ) : the_row();
						$photo       = get_sub_field( 'photo' );
						$name        = get_sub_field( 'name' );
						$date        = get_sub_field( 'date' );
						$testimonial = get_sub_field( 'testimonial' );
						?>
                        <article class="testim-item">
                            <div class="testim-item__wrapper">
								<?php echo wp_get_attachment_image( $photo, "medium", false, array( "class" => "testim-item__photo" ) ); ?>
                                <div>
                                    <h3 class="testim-item__name"><?php echo $name; ?></h3>
                                    <p class="testim-item__dob"><?php echo $date; ?></p>
                                </div>
                            </div>
                            <div class="testim-item__testim">
								<?php echo $testimonial; ?>
                            </div>
                        </article>
					<?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>