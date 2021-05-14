<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>
<main class="main-content post-page">
    <section class="grid-container ease-left" data-scroll>
        <div class="grid-x grid-margin-x">
            <ul class="breadcrumbs cell">
                <li class="breadcrumbs__item">
                    <a class="breadcrumbs__link" href="<?php echo home_url(); ?>"><?php _e( "Home", "Recipe" ); ?></a>
                </li>
                <li class="breadcrumbs__item">
                    <a class="breadcrumbs__link"
                       href="<?php echo get_post_type_archive_link( "post" ); ?>"><?php _e( "Our blog", "Recipe" ); ?></a>
                </li>
                <li class="breadcrumbs__item current"><?php _e( "Article", "Recipe" ); ?></li>
            </ul>
        </div>
    </section>
    <!-- BEGIN of post content -->
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
                <div class="grid-container ease-left" data-scroll>
                    <div class="grid-x grid-margin-x">
                        <h1 class="entry__title cell"><?php the_title(); ?></h1>
                        <div class="entry__info cell">
							<?php if ( have_rows( "share_btns", "options" ) ): ?>
                                <div class="entry__share share">
									<?php while ( have_rows( "share_btns", "options" ) ): the_row();
										$icon_top       = get_sub_field( "icon_top" );
										$social_network = get_sub_field( "social_network" );
										if ( $social_network == "facebook" ) {
											$social_network = "https://www.facebook.com/sharer/sharer.php?&u=" . urlencode( get_the_permalink() );
										} elseif ( $social_network == "twitter" ) {
											$social_network = "https://twitter.com/intent/tweet?url=" . urlencode( get_the_permalink() ) . "&text=" . urlencode( get_the_excerpt() );
										} elseif ( $social_network == "linkedin" ) {
											$social_network = "https://www.linkedin.com/cws/share?url=" . urlencode( get_the_permalink() );
										} elseif ( $social_network == "pinterest" ) {
											$social_network = "http://pinterest.com/pin/create/button/?url=" . urlencode( get_the_permalink() ) . "&media=" . urlencode( get_the_post_thumbnail_url( get_the_ID(), "thumbnail" ) ) . "&description=" . urlencode( get_the_excerpt() );
										} ?>
                                        <a class="share__link" href="<?php echo $social_network; ?>">
											<?php echo wp_get_attachment_image( $icon_top ); ?>
                                        </a>
									<?php endwhile; ?>
                                </div>
							<?php endif; ?>
	                        <?php if ( $category = get_the_category() ) {
		                        printf(
			                        '<a href="%s" class="entry__cat">%s</a>',
			                        esc_url( get_category_link( $category[0] ) ),
			                        esc_html( $category[0]->name )
		                        );
	                        } ?>
                            <p class="entry__date">
                                <?php echo get_the_date( "j F, Y" ); ?>
                                <span class="entry__views">
                                    <?php echo get_post_meta( $post->ID, 'views', true ); ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
				<?php if ( has_post_thumbnail() ) : ?>
                    <div title="<?php the_title_attribute(); ?>" class="entry__thumb-container jarallax">
						<?php the_post_thumbnail( 'full', array( "class" => "entry__thumb jarallax-img" ) ); ?>
                    </div>
				<?php endif; ?>
                <div class="grid-container">
                    <div class="grid-x grid-margin-x">
                        <div class="entry__content clearfix cell ease-top" data-scroll>
							<?php the_content( '', true ); ?>
                        </div>
                        <div class="entry__pagination cell ease-btm" data-scroll>
                            <div class="page-link-wrapper">
								<?php previous_post_link( "%link", "<div class='pag-link prev'><span>Previous article</span><p>%title</p></div>" ); ?>
                            </div>
                            <div class="page-link-wrapper">
								<?php next_post_link( "%link", "<div class='pag-link next'><span>Next article</span><p>%title</p></div>" ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
		<?php endwhile; ?>
	<?php endif; ?>
    <!-- END of post content -->
	<?php $featured_posts = get_field( "featured_posts" );
	if ( $featured_posts ) : ?>
        <section class="featured-posts">
            <div class="grid-container">
                <div class="grid-x grid-margin-x align-center">
                    <h3 class="featured-posts__title text-center cell"><?php _e( "You may also like", "Recipe" ) ?></h3>
					<?php foreach ( $featured_posts as $post ):
						setup_postdata( $post ); ?>
                        <div class="large-4 medium-6 cell">
							<?php get_template_part( 'parts/loop', 'post' ); ?>
                        </div>
					<?php endforeach;
					wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
	<?php endif; ?>
	<?php if ( have_rows( "share_btns", "options" ) ): ?>
        <section class="share-section ease-btm" data-scroll>
			<?php while ( have_rows( "share_btns", "options" ) ): the_row();
				$icon_btm       = get_sub_field( "icon_btm" );
				$social_network = get_sub_field( "social_network" );
				if ( $social_network == "facebook" ) {
					$social_network = "https://www.facebook.com/sharer/sharer.php?&u=" . urlencode( get_the_permalink() );
				} elseif ( $social_network == "twitter" ) {
					$social_network = "https://twitter.com/intent/tweet?url=" . urlencode( get_the_permalink() ) . "&text=" . urlencode( get_the_excerpt() );
				} elseif ( $social_network == "linkedin" ) {
					$social_network = "https://www.linkedin.com/cws/share?url=" . urlencode( get_the_permalink() );
				} elseif ( $social_network == "pinterest" ) {
					$social_network = "http://pinterest.com/pin/create/button/?url=" . urlencode( get_the_permalink() ) . "&media=" . urlencode( get_the_post_thumbnail_url( get_the_ID(), "thumbnail" ) ) . "&description=" . urlencode( get_the_excerpt() );
				} ?>
                <a class="share-section__link share-link" href="<?php echo $social_network; ?>">
					<?php echo wp_get_attachment_image( $icon_btm ); ?>
                </a>
			<?php endwhile; ?>
        </section>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
