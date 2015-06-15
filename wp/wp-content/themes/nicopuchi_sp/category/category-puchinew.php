<?php
/**
 * プチニュー10
 **/
?>

<article id="main">
  <ul class="dir-path cFix">
    <li><a href="">TOP</a>></li>
    <li>ページタイトル</li>
  </ul>
  <div class="module-type01">
    <div class="module-body bg-type04 inner10">
        <div class="module-head">
            <h2 class="module-head-ttl mb10"><img class="full" src="<?php home(); ?>/common/img/sp/03/ttl01.png" alt="プチニュー10"></h2>
        </div>
        <?php if (have_posts()): ?>
            <ul id="puchinew10" class="index-list-type02">
                <?php while (have_posts()): the_post(); ?>
                    <li>
                        <?php if (get_the_content()): ?>
                            <a href="<?php the_permalink(); ?>" class="new">
                        <?php elseif (get_field('link')) : ?>
                            <a href="<?php the_field('link'); ?>" target="_<?php the_field('window'); ?>" class="new">
                        <?php endif; ?>
                            <dl>
                                <dt>
                                    <img class="full thum" src="<?php home(); ?>/common/img/sp/03/img_sample01.jpg" alt="">
                                </dt>
                                <dd>
                                    <p class="desc"><?php the_title(); ?></p>
                                    <span class="date"><?php echo get_the_date('Y.m.d'); ?></span>
                                </dd>
                            </dl>
                        <?php if (get_the_content() || get_field('link')) : ?>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
                <!--/#puchinew10-->
            </ul>
        <?php endif; ?>
      <ul class="pageNav01 pt10">
        <li><span>1</span></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li>…</li>
        <li><a href="#">16</a></li>
        <li><a href="#"><img src="../common/img/sp/arrow_R.jpg" width="12" height="12"></a></li>
      </ul>
    </div>
    <!--/.module-type01--></div>
  <!--/#main--></article>
