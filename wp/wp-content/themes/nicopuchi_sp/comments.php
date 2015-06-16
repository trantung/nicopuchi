<?php
/**
 * コメント
 */
?>

<?php if (have_comments()): ?>
	<div class="comment_head">
		<img src="/common/img/sp/04/icn_comment.gif" width="25" height="20">コメント（<?php comments_number('0', '1', '%'); ?>）
	</div>
	<?php wp_list_comments(array(
		'style' => '',
		'type' => 'comment',
		'callback' => 'my_comlist_sp'
	)); ?>
<?php endif; ?>
<?php
$logned_in_as = '<p class="logged-in-as">'
	. sprintf(__('%2$sとしてログインしています。'
		. ' <a href="%3$s">ログアウト</a>'),
		admin_url('profile.php'),
		$user_identity,
		wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>';
$args = array(
	'must_log_in' => null,
	'logged_in_as' => $logged_in_as,
	'comment_notes_before'  => null,
	'comment_notes_after'  => null,
);
comment_form($args);
?>


