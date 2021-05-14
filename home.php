<?php
/**
 * Home
 *
 * Standard loop for the blog-page
 */
get_header(); ?>

<?php
$page_id    = get_option( "page_for_posts" );
$blog_title = get_the_title( $page_id );
$blog_desc  = get_field( "blog_desc", $page_id );
$blog_img   = get_the_post_thumbnail( $page_id, "full", array( "class" => "blog-page__img jarallax-img" ) );
?>
    <main class="main-content blog-page">
        <div class="grid-container ease-left" data-scroll>
            <div class="grid-x grid-margin-x">
                <ul class="breadcrumbs cell">
                    <li class="breadcrumbs__item">
                        <a class="breadcrumbs__link" href="<?php echo home_url(); ?>"><?php _e ("Home", "Recipe"); ?></a>
                    </li>
                    <li class="breadcrumbs__item current"><?php _e ("Our blog", "Recipe"); ?></li>
                </ul>
				<?php if ( $blog_title ) : ?>
                    <h1 class="blog-page__title page-title cell"><?php echo $blog_title; ?></h1>
				<?php endif; ?>
				<?php if ( $blog_desc ) : ?>
                    <div class="blog-page__desc cell">
						<?php echo $blog_desc; ?>
                    </div>
				<?php endif; ?>
            </div>
        </div>
		<?php if ( $blog_img ) : ?>
            <div class="blog-page__img-container jarallax">
				<?php echo $blog_img; ?>
            </div>
		<?php endif; ?>
        <div class="grid-container ease-left" data-scroll>
            <div class="grid-x grid-margin-x">
                <div class="blog-page__search large-4 medium-6 cell">
					<?php get_search_form(); ?>
                </div>
                <div class="blog-page__filter large-4 medium-6 cell ease-left" data-scroll>
                    <div class="cat-filter">
                        <button id="filter-btn" class="cat-filter__btn">All topics</button>
                        <ul class="cat-filter__list">
							<?php wp_list_categories( "hide_empty=0&title_li=" ); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-page__list grid-container">
            <div class="grid-x grid-margin-x">
                <!-- BEGIN of Blog posts -->
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
                        <div class="large-4 medium-6 cell">
							<?php get_template_part( 'parts/loop', 'post' ); // Post item ?>
                        </div>
					<?php endwhile; ?>
                    <!-- BEGIN of pagination -->
                    <div class="pagination-wrapper cell ease-btm" data-scroll>
						<?php foundation_pagination(); ?>
                    </div>
                    <!-- END of pagination -->
				<?php endif; ?>
                <!-- END of Blog posts -->
            </div>
        </div>
    </main>

<?php get_footer(); ?>