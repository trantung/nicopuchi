<?php
/**
 * コメント
 */
?>



<?php if (have_comments()): ?>
    <div class="inner">
        <h4 class="ttl-comment">コメント（<?php comments_number('0','1','%'); ?>）</h4>
        <ul>

            <?php wp_list_comments(array(
                'style' => 'ul',
                'type' => 'comment',
                'callback' => 'my_comlist'
            )); ?>
        </ul>
    </div>
    <?php comment_form(); ?>
<?php endif; ?>


