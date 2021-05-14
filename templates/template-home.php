<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

    <!--HOME PAGE SLIDER-->
<?php //home_slider_template(); ?>
    <!--END of HOME PAGE SLIDER-->

    <!-- BEGIN of main content -->
<?php
$main_title = get_field( "main_title" );
$main_desc  = get_field( "main_desc" );
$main_form  = get_field( "main_form" );
$main_bg    = get_field( 'main_bg' );
if ( $main_title || $main_desc || $main_form ) : ?>
    <section class="main-section section-padding rel-wrap ease-top" data-scroll>
		<?php if ( $main_bg ) {
			echo wp_get_attachment_image( $main_bg, "full", false, array( "class" => "main-section__bg stretched-img" ) );
		} ?>
        <div class="main-section__container grid-container rel-content align-center">
            <div class="grid-x">
                <div class="cell">
					<?php if ( $main_title ) : ?>
                        <h1 class="main-section__title text-center"><?php echo $main_title; ?></h1>
					<?php endif; ?>
					<?php if ( $main_desc ) : ?>
                        <div class="main-section__desc text-center">
							<?php echo $main_desc; ?>
                        </div>
					<?php endif; ?>
					<?php if ( $main_form ) : ?>
                        <div class="main-section__form">
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
    <section class="features-section section-padding grid-x ease-btm" data-scroll>
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
$pricing_title  = get_field( "pricing_title" );
$pricing_anchor = get_field( "pricing_anchor" );
$pricing_desc   = get_field( "pricing_desc" );
$pricing_url    = get_field( "pricing_url" );
$pricing_note   = get_field( "pricing_note" );
$pricing_link   = get_field( "pricing_link" );
if ( $pricing_title || $pricing_desc || $pricing_link ) : ?>
	<?php if ( $pricing_anchor ) : ?>
        <div id="<?php echo $pricing_anchor; ?>" class="anchor"></div>
	<?php endif; ?>
    <section class="pricing-section section-padding grid-container text-center ease-top" data-scroll>
        <div class="grid-x grid-margin-x">
            <div class="cell">
				<?php if ( $pricing_title ) : ?>
                    <h2 class="pricing-section__title section-title"><?php echo $pricing_title; ?></h2>
				<?php endif; ?>
				<?php if ( $pricing_desc ) : ?>
                    <div class="pricing-section__desc">
						<?php echo $pricing_desc; ?>
                    </div>
				<?php endif; ?>
                <div class="switch">
                    <h5 class="switch__title switch__title--active">Monthly</h5>
                    <label class="switch__btn">
                        <input id="switch-btn" class="input" type="checkbox">
                        <span class="slider"></span>
                    </label>
                    <h5 class="switch__title">Yearly</h5>
                </div>
                <div class="pricing-section__container">
					<?php if ( have_rows( "pricing_monthly" ) ): ?>
                        <div class="pricing-section__list pricing-section__list--active">
							<?php while ( have_rows( 'pricing_monthly' ) ) : the_row();
								$icon  = get_sub_field( 'icon' );
								$price = get_sub_field( 'price' );
								?>
                                <a class="pricing-item" href="<?php echo $pricing_url; ?>" target="_blank">
                                    <?php echo wp_get_attachment_image( $icon, "medium", false, array(
                                        "class" => "pricing-item__icon"
                                    ) ); ?>
                                    <p class="pricing-item__price">
                                        <?php echo $price; ?>
                                        <span class="pricing-item__period<?php echo $pricing_note ? " pricing-item__period--note" : "" ?>">
                                        <?php _e( "/ mo", "Recipe" ); ?>
                                    </span>
                                    </p>
                                </a>
							<?php endwhile; ?>
                        </div>
					<?php endif; ?>
					<?php if ( have_rows( "pricing_monthly" ) ): ?>
                        <div class="pricing-section__list">
							<?php while ( have_rows( 'pricing_yearly' ) ) : the_row();
								$icon  = get_sub_field( 'icon' );
								$price = get_sub_field( 'price' );
								?>
                                <a class="pricing-item" href="<?php echo $pricing_url?>" target="_blank">
                                    <?php echo wp_get_attachment_image( $icon, "medium", false, array(
                                        "class" => "pricing-item__icon"
                                    ) ); ?>
                                    <p class="pricing-item__price">
                                        <?php echo $price; ?>
                                        <span class="pricing-item__period<?php echo $pricing_note ? " pricing-item__period--note" : "" ?>">
                                            <?php _e( "/ year", "Recipe" ); ?>
                                        </span>
                                    </p>
                                </a>
							<?php endwhile; ?>
                        </div>
					<?php endif; ?>
                </div>
				<?php if ( $pricing_note ) : ?>
                    <p class="pricing-section__note"><?php echo $pricing_note; ?></p>
				<?php endif; ?>
				<?php if ( $pricing_link ):
					$link_url = $pricing_link['url'];
					$link_title = $pricing_link['title'];
					$link_target = $pricing_link['target'] ? $pricing_link['target'] : '_self';
					?>
                    <a class="button"
                       href="<?php echo esc_url( $link_url ); ?>"
                       target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
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

<?php
$about_title  = get_field( "about_title" );
$about_anchor = get_field( "about_anchor" );
$about_text   = get_field( "about_text" );
$about_img    = get_field( "about_img" );
$about_sign   = get_field( "about_sign" );
if ( $about_title && $about_text ) : ?>
	<?php if ( $about_anchor ) : ?>
        <div id="<?php echo $about_anchor; ?>" class="anchor"></div>
	<?php endif; ?>
    <section class="about-section section-padding grid-container ease-top" data-scroll>
        <div class="grid-x grid-margin-x">
            <h2 class="about-section__title section-title cell"><?php echo $about_title; ?></h2>
            <div class="about-section__text large-6 cell">
				<?php echo $about_text; ?>
				<?php echo wp_get_attachment_image( $about_sign, "full", false, array( "class" => "about-section__sign" ) ); ?>
            </div>
			<?php if ( $about_img ) : ?>
                <div class="large-6 cell">
					<?php echo wp_get_attachment_image( $about_img, "full", false, array( "class" => "about-section__img" ) ); ?>
                </div>
			<?php endif; ?>

        </div>
    </section>
<?php endif; ?>

<?php
$blog_title  = get_field( "blog_title" );
$blog_anchor = get_field( "blog_anchor" );
$blog_desc   = get_field( "blog_desc" );
$blog_posts  = get_field( "blog_posts" );
$blog_link   = get_field( "blog_link" );
if ( $blog_posts ) : ?>
	<?php if ( $blog_anchor ) : ?>
        <div id="<?php echo $blog_anchor; ?>" class="anchor"></div>
	<?php endif; ?>
    <section class="blog-section section-padding grid-container ease-btm" data-scroll>
        <div class="grid-x">
            <div class="cell">
				<?php if ( $blog_title ) : ?>
                    <h2 class="blog-section__title section-title text-center"><?php echo $blog_title; ?></h2>
				<?php endif; ?>
				<?php if ( $blog_desc ) : ?>
                    <div class="blog-section__desc text-center">
						<?php echo $blog_desc; ?>
                    </div>
				<?php endif; ?>
                <div class="blog-section__list">
					<?php foreach ( $blog_posts as $post ):
						setup_postdata( $post ); ?>
						<?php get_template_part( 'parts/loop', 'post' ); ?>
					<?php endforeach;
					wp_reset_postdata(); ?>
                </div>
				<?php if ( $blog_link ):
					$link_url = $blog_link['url'];
					$link_title = $blog_link['title'];
					$link_target = $blog_link['target'] ? $blog_link['target'] : '_self';
					?>
                    <div class="text-center">
                        <a class="button button--outline"
                           href="<?php echo esc_url( $link_url ); ?>"
                           target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    </div>
				<?php endif; ?>
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
    <section class="cta-section section-padding rel-wrap ease-top" data-scroll>
		<?php if ( $cta_bg ) {
			echo wp_get_attachment_image( $cta_bg, "full", false, array( "class" => "cta-section__bg stretched-img" ) );
		} ?>
        <div class="grid-container rel-content">
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
    <!-- END of main content -->

<?php get_footer(); ?>