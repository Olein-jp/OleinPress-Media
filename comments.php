<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/10/19
 * Time: 20:10
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title display-6 text-center mb-3">
			<?php
			$oleinpressMedia_comment_count = get_comments_number();
			if ( '1' === $oleinpressMedia_comment_count ) {
				printf(
				/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'oleinpressMedia' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
				/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $oleinpressMedia_comment_count, 'comments title', 'oleinpressMedia' ) ),
					number_format_i18n( $oleinpressMedia_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="c-commentList">
			<?php
			wp_list_comments( array(
					'style'         => 'ol',
					'max_depth'     => 3,
					'short_ping'    => true,
					'avatar_size'   => '50',
					'callback'      => 'oleinpressMedia_comment',
 			) );

//			wp_list_comments( array(
//				'style'       => 'ol',
//				'short_ping'  => true,
//				'callback'    => 'oleinpressMedia_comment',
//				'avatar_size' => 100,
//			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'oleinpressMedia' ); ?></p>
		<?php
		endif;
	endif; // Check for have_comments().
	comment_form();
	?>

</div><!-- #comments -->