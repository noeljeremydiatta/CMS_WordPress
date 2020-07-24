<?php get_header('post'); ?>

<main role="main" id="site-content">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- Hero image -->
			<?php if ( has_post_thumbnail()) : 
				$img_url = get_the_post_thumbnail_url();
			?>
			<div class="post-hero" style="background-image: url('<?php echo esc_url( $img_url); ?>')"></div>
			<?php endif; ?>
			
			<div class="wrapper">
				<div class="post-content">
					<div class="post-header">
						<h1><?php the_title(); ?></h1>
						<span class="category"><?php the_category(', ');?></span>
						<span class="tags"><?php the_tags();?></span>

						<?php
							$sidebar = get_theme_mod ('posts_sidebar', '');
							$content_sidebar = '';
							if (  1 == $sidebar ) { 
								$content_sidebar = 'has-sidebar';
								?>
								<div class="sidebar desktop-sidebar">
									<?php dynamic_sidebar('widget-area-posts'); ?>
								</div>
							<?php }	?>
					</div>

					<div class="post-details <?php echo esc_attr($content_sidebar); ?>">
						<span class="date"><?php the_time('d-m-Y'); ?></span>
						<?php 
						the_content();  

						// Comments
						comments_template();
							
						if (  1 == $sidebar ) { ?>
							<div class="sidebar mobile-sidebar">
								<?php dynamic_sidebar('widget-area-posts'); ?>
							</div>
						<?php }	?>
					</div>
						
				</div>

				<?php
				// Posts navigation.
				$defaults = array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next post', 'eva-blog' ) . ': </span> ' .
							'<span class="screen-reader-text">' . __( 'Next post:', 'eva-blog' ) . '</span> ' .
							'<span>%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous post', 'eva-blog' ) . ': </span> ' .
							'<span class="screen-reader-text">' . __( 'Previous post:', 'eva-blog' ) . '</span> ' .
							'<span>%title</span>',
				);
				the_post_navigation(  $defaults );
				?>	
			</div>
		
		</article>

	<?php endwhile; ?>

	<?php else: ?>

		<!-- No results -->
		<article>
			<div class="wrapper">
				<h1><?php esc_html_e( 'Sorry, nothing to display.', 'eva-blog' ); ?></h1>
			</div>
		</article>

	<?php endif; ?>

	</section>
</main>

<?php get_footer(); ?>
