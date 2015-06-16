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
    $logged_in_as = '<p class="logged-in-as">'
                    . sprintf(__('%2$sとしてログインしています。'
                    . ' <a href="%3$s">ログアウト</a>'),
                    admin_url('profile.php'),
                    $user_identity,
                    wp_logout_url(apply_filters('the_permalink', get_permalink($post_id)))) . '</p>';
    $args = array(
        'must_log_in' => null,
        'logged_in_as' => $logged_in_as,
        'comment_notes_before' => null,
        'comment_notes_after' => null,
    );
    comment_form($args);
    ?>
<?php endif; ?>


