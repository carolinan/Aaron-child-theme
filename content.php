<?php
/**
 * @package aaron
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class();  ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a><i aria-hidden="true"></i></h2>' ); ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php aaron_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( has_post_thumbnail() && get_theme_mod( 'aaron_show_excerpt' ) ){
				the_post_thumbnail( 'thumbnail' );
				echo '<div class="wrap-content">';
				the_excerpt();
				echo '</div>';
			}else if (get_theme_mod( 'aaron_show_excerpt' )){
				the_excerpt();
			}else{
				if ( has_post_thumbnail()){
					the_post_thumbnail( );
				}

				/* translators: %s: Name of current post */
				the_content( sprintf( esc_html__( 'Continue reading %s', 'aaron' ), get_the_title() ) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aaron' ),
					'after'  => '</div>',
				) );
			}
		?>
	</div><!-- .entry-content -->

	<?php aaron_entry_footer(); ?>

</article><!-- #post-## -->