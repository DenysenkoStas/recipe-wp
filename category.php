<?php
/**
 * Category
 *
 * Standard loop for the category page
 */
get_header(); ?>

<?php $cat_title = get_queried_object()->name; ?>
<main class="main-content cat-page">
    <div class="grid-container ease-left" data-scroll>
        <div class="grid-x grid-margin-x">
            <ul class="breadcrumbs cell">
                <li class="breadcrumbs__item">
                    <a class="breadcrumbs__link" href="<?php echo home_url(); ?>"><?php _e( "Home", "Recipe" ); ?></a>
                </li>
                <li class="breadcrumbs__item">
                    <a class="breadcrumbs__link"
                       href="<?php echo get_post_type_archive_link( "post" ); ?>"><?php _e( "Our blog", "Recipe" ); ?></a>
                </li>
                <li class="breadcrumbs__item current"><?php _e( "Category", "Recipe" ); ?></li>
            </ul>
            <h1 class="cat-page__title page-title cell"><?php echo $cat_title; ?></h1>
        </div>
    </div>
    <div class="grid-container ease-left" data-scroll>
        <div class="grid-x grid-margin-x">
            <div class="cat-page__search large-4 medium-6 cell">
				<?php get_search_form(); ?>
            </div>
            <div class="cat-page__filter large-4 medium-6 cell ease-left" data-scroll>
                <div class="cat-filter">
                    <button id="filter-btn" class="cat-filter__btn"><?php echo $cat_title; ?></button>
                    <ul class="cat-filter__list">
						<?php wp_list_categories( "hide_empty=0&show_option_all=All topics&title_li=" ); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN Category Content -->
    <div class="cat-page__list grid-container">
        <div class="grid-x grid-margin-x">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?><!-- BEGIN of Post -->
                    <div class="large-4 medium-6 cell">
						<?php get_template_part( 'parts/loop', 'post' ); // Post item ?>
                    </div>
				<?php endwhile; ?>
			<?php endif; ?>
            <!-- BEGIN of pagination -->
            <div class="pagination-wrapper cell ease-btm" data-scroll>
				<?php foundation_pagination(); ?>
            </div>
            <!-- END of pagination -->
        </div>
    </div>
    <!-- END Category Content -->
</main>

<?php get_footer(); ?>
