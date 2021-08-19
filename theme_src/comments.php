<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RPL_Libraria
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>


<div class="comments-area" id="comments">
	<!-- <div class="container dashed-black"></div> -->

	<?php if (have_comments()):?>
	<div class="comment-bg container">
		<h4 class="comments-title" style="text-transform: none;">Comments</h4>
	<?php else:?>
	<?php endif;?>
		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'walker' => new comment_walker,
				) );
			?>
		</ol><!-- .comment-list -->
	</div>

	<div class="container" style="padding-top: 40px;">
		<?php
		comment_form(array(
				'label_submit' => __('Submit', 'rpl'),
				'title_reply' => __('<div style="font-size: 16px; font-weight: 400; text-transform: uppercase;">Write Your Comment</div>', 'rpl'),
				'comment_field' => __('<p class="comment-form-comment"><textarea name="comment" id="comment" placeholder="Start typing here..."></textarea></p>', 'rpl'),
				'title_reply_to' => __('Respond to %s', 'rpl'),
				'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __('(No worries, we will keep your email safe! Also, make sure you fill in email and name fields before posting a comment.)', 'rpl') . '</span></p>'
		));
		?>
	</div>
</div><!--comments-area-->
