<?php
/**
 * コメント
 */
?>

<?php if (have_comments()): ?>
	<div class="comment_head">
		<img src="/common/img/sp/04/icn_comment.gif" width="25" height="20">コメント（<?php comments_number('0', '1', '%'); ?>）
	</div>
		<ul>
			<?php wp_list_comments(array(
				'style' => 'ul',
				'type' => 'comment',
				'callback' => 'my_comlist'
			)); ?>
		</ul>
	</div>
	<?php
	$args = array(
		'must_log_in' => null,
		'logged_in_as' => null,
		'comment_notes_before'  => null,
		'comment_notes_after'  => null,
	);
	comment_form($args);
	?>
<?php endif; ?>


