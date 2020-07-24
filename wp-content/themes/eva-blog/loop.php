<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail('large'); ?>
			</a>
		<?php endif; ?>

		<!-- post title -->
		<h2 class="post-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title_attribute(); ?></a>
		</h2>

		<!-- post category -->
		<span class="category"><?php the_category(', '); ?></span>

	</article>

<?php endwhile; ?>

<?php else: ?>

	<!-- No results -->
	<article>
		<h2><?php esc_html_e( 'Sorry, nothing to display.', 'eva-blog' ); ?></h2>
	</article>

<?php endif; ?>
