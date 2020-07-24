<?php get_header(); ?>

	<main role="main" id="site-content">
		<!-- section -->
		<section>

			<h1 class="page-title"><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php 
					the_content(); 
					$defaults = array(
						'before'           => '<p class="page-navigation">' . __( 'Pages:', 'eva-blog' ),
						'after'            => '</p>',
						'link_before'      => '',
						'link_after'       => '',
						'next_or_number'   => 'number',
						'separator'        => ' ',
						'nextpagelink'     => __( 'Next page', 'eva-blog'),
						'previouspagelink' => __( 'Previous page', 'eva-blog' ),
						'pagelink'         => '%',
						'echo'             => 1
					);
					wp_link_pages( $defaults );	 	
				

					comments_template( '', true );	
				?>

				<br class="clear">

			</article>

		<?php endwhile; ?>

		<?php else: ?>

			<!-- No results -->
			<article>

				<h2><?php esc_html_e( 'Sorry, nothing to display.', 'eva-blog' ); ?></h2>

			</article>

		<?php endif; ?>

		</section>
	</main>
</div><!-- /wrapper -->

<?php get_footer(); ?>
