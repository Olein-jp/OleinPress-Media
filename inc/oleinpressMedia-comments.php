<?php
/**
 * Created by PhpStorm.
 * User: kojikuno
 * Date: 2018/10/24
 * Time: 9:33
 */


function oleinpressMedia_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class( 'container' ); ?> id="commentBody-<?php comment_ID(); ?> c-commentBody">
	<div class="row mb-5">
		<figure class="c-commentBody__thumbnail col-md-2">
			<?php echo get_avatar( $comment, $arg[ 'avatar_size' ],'mm','', array('class'=>"c-commentBody__avatar rounded-circle img-fluid") ); ?>
		</figure>
		<div class="c-commentBody__content col-md-10 card px-0">
			<div class="card-header bg-light">
				<?php printf(__('<cite class="p-commentHeader__name">%s</cite>'), get_comment_author_link() ); ?>
				<a class="p-commentHeader__meta" href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">
					<time class="" datetime="<?php comment_time( 'c' ); ?>">
						<?php comment_date() ?> <?php comment_time() ?>
					</time>
				</a>
				<?php edit_comment_link(); ?>
			</div>
			<div class="card-body">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="card-text comment-awaiting-moderation label label-info text-muted small"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
				<?php endif; ?>
				<?php comment_text(); ?>
			</div>
		</div>
	</div>
<?php }

add_filter( 'edit_comment_link', 'oleinpressMedia_edit_comment_link' );
function oleinpressMedia_edit_comment_link( $link ) {
	$link = '<a class="comment-edit-link btn btn-sm btn-primary" href="' . esc_url( get_edit_comment_link( $comment ) ) . '">' . __( 'Edit comment', 'oleinpressMedia' ) . '</a>';
	return $link;
}

add_filter( 'comment_form_default_fields', 'oleinpressMedia_comment_form_fields' );
function oleinpressMedia_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$fields    = array(
		'author' =>
			'<div class="form-group mb-4">' .
			'<label for="author" class="">' . __( 'Name', 'oleinpressMedia' ) . ( $req ? '<span class="required text-danger">*</span>' : '' ) . '</label> ' .
			'<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="30"' . $aria_req . ' />' .
			'</div>',
		'email' =>
			'<div class="form-group mb-4">' .
			'<label for="email" class="">' . __( 'Email', 'oleinpressMedia' ) . ( $req ? '<span class="required text-danger">*</span>' : '' ) . '</label> ' .
			'<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			'" size="30"' . $aria_req . ' />' .
			'</div>',
		'url' =>
			'<div class="form-group mb-4">' .
			'<label for="url">' .
			__( 'Website', 'oleinpressMedia' ) . '</label>' .
			'<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			'" size="30" />' .
			'</div>',
	);
	return $fields;
}
add_filter( 'comment_form_defaults', 'oleinpressMedia_comment_form' );
function oleinpressMedia_comment_form( $args ) {
	$args[ 'title_reply' ]          = __( 'Leave a reply', 'oleinpressMedia' );
	$args[ 'title_reply_before' ]   = '<h3 id="reply-title" class="comment-reply-title text-center display-4">';
	$args[ 'title_reply_to' ]       = __( 'Leave a reply to %s', 'oleinpressMedia' );
	$args[ 'comment_notes_before' ] = '<p class="lead text-center text-secondary">' . __( 'Your email address will not be published.', 'oleinpressMedia' ) . '</p>';
	$args[ 'comment_notes_after' ]  = __( '', 'oleinpressMedia' );
	$args[ 'label_submit' ]         = __( 'send', 'oleinpressMedia' );
	$args[ 'comment_field' ]        = '<div class="field-group mb-4">' .
									  '<label for="comment">' . __( 'Comment', 'oleinpressMedia' ) .
									  '</label>' .
									  '<textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true">' .
									  '</textarea>' .
									  '</div>';
	$args[ 'submit_field' ]         = '<div class="form-submit mb-4">%1$s %2$s</div>';
	$args[ 'submit_button' ]        = '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />';
	$args[ 'class_submit' ]         = 'btn btn-primary btn-lg btn-block';
	return $args;
}