<?php
/**
 * 固定ページ基本
 */
?>



<article id="main">
    <?php my_breadcrumbs_sp(); ?>
    <div class="module-type01">
        <?php if (have_posts()) : ?>
            <?php the_post(); ?>
            <div class="module-body bg-type02">
                <div class="module-head inner10">
                    <h2 class="module-head-ttl"><img class="full" src="/common/img/sp/10/ttl01.png" alt="お問い合わせ"></h2>
                    <div id="contact">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!--/.module-type01-->
    <!--/#main--></article>


