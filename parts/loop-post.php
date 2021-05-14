<!-- BEGIN of Post -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'preview ease-top preview--' . get_post_type() ); ?>
         data-scroll>
	<?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail( 'large', array( 'class' => 'preview__thumb' ) ); ?>
        </a>
	<?php endif; ?>
	<?php if ( $category = get_the_category() ) {
		printf(
			'<a href="%s" class="preview__cat">%s</a>',
			esc_url( get_category_link( $category[0] ) ),
			esc_html( $category[0]->name )
		);
	} ?>
    <a href="<?php the_permalink(); ?>"
       title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'default' ), the_title_attribute( 'echo=0' ) ) ); ?>"
       rel="bookmark">
        <h3 class="preview__title"><?php echo get_the_title() ? : __( 'No title', 'default' ); ?></h3>
    </a>
    <p class="preview__date">
		<?php echo get_the_date( "j F, Y" ); ?>
        <span class="preview__views"><?php echo get_post_meta( $post->ID, 'views', true ); ?></span>
    </p>
</article>
<!-- END of Post -->
