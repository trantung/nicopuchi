<?php
/**
 * コメント
 */
?>



<?php if (have_comments()): ?>
    <div class="inner">
        <h4 class="ttl-comment">コメント（<?php comments_number('0', '1', '%'); ?>）</h4>
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
        'comment_notes_before'  => null,
        'comment_notes_after'  => null,
    );
    comment_form($args);
    ?>
<?php endif; ?>


