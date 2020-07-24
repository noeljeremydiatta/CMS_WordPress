<div class="comments">
	<?php if (post_password_required()) : ?>
	<p><?php esc_html_e( 'Post is password protected. Enter the password to view any comments.', 'eva-blog' ); ?></p>
</div>

	<?php return; endif; ?>

<?php if (have_comments()) : ?>

	<h2><?php comments_number(); ?></h2>

	<ul>
		<?php wp_list_comments();?>
	</ul>

	<?php
		// Comment navigation
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'eva-blog' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'eva-blog' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'eva-blog' ) ); ?></div>
		</nav>
	<?php endif; ?>

<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<p><?php esc_html_e( 'Comments are closed here.', 'eva-blog' ); ?></p>

<?php endif; ?>

<?php comment_form(); ?>

</div>
