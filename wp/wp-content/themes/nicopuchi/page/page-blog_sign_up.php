<?php
/**
 * プチモブログ会員登録
 */
?>



<div id="contents">
    <div id="main">
        <?php my_breadcrumbs(); ?>

        <div class="module-type01 bg-type03 pb60">
            <div class="module-head">
                <h2 class="inner15"><img src="/common/img/pc/04/ttl01.png" alt="プチモ☆ブログ" width="794" height="162"></h2>
            </div>
            <div class="module-body">
                <div class="blog-area">
                    <?php if (have_posts()) : ?>
                        <?php the_post(); ?>
                        <div class="blog-inner">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--/.module-type01--></div>
        <!--/#main--></div>
    <!--/#contents--></div>


