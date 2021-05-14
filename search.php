<?php
/**
 * Index
 *
 * Standard loop for the search result page
 */
get_header(); ?>

<main class="main-content grid-container">
    <div class="grid-x grid-margin-x posts-list">
        <!-- BEGIN of search results -->
        <div class="cell ease-left" data-scroll>
            <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'default' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			<?php get_search_form(); ?>
        </div>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
                <div class="large-4 medium-6 cell">
					<?php get_template_part( 'parts/loop', 'post' ); // Post item ?>
                </div>
			<?php endwhile; ?>
		<?php else: ?>
            <p class="cell ease-right" data-scroll><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'default' ); ?></p>
		<?php endif; ?>
        <!-- BEGIN of pagination -->
        <div class="pagination-wrapper cell ease-btm" data-scroll>
			<?php foundation_pagination(); ?>
        </div>
        <!-- END of pagination -->
        <!-- END of search results -->
    </div>
</main>

<?php get_footer(); ?>
