<?php
/**
 * ブログ
 **/
?>

<article id="main">
	<?php my_breadcrumbs_sp() ?>
	<div class="module-type01">
		<div class="puchimoblog module-body bg-type03 inner10">
			<div class="module-head">
				<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/04/ttl01.png" alt="プチモ☆ブログ"></h2>
			</div>
			<div class="past_thema">
				<table>
					<tr>
						<th align="right" class="yellow" scope="row">月別ブログ記事</th>
						<td align="right"><a href="#">2015年6月<img src="/common/img/sp/arrow_d.png" width="23" height="23" class="ml10"></a></td>
					</tr>
				</table>
			</div>
			<div id="timeline">
				<?php
				$args = array(
					'category_name' => $cat_info->slug,
					'posts_per_page' => 10,
					'paged' => get_query_var('paged')
				);
				$year = get_query_var('year');
				$month = get_query_var('monthnum');
				$day = get_query_var('day');
				if ($year)
				{
					$args['year'] = $year;
				}
				if ($month)
				{
					$args['monthnum'] = $month;
				}
				if ($day)
				{
					$args['day'] = $day;
				}
				query_posts($args);
				?>
				<?php if (have_posts()) : ?>
					<ul class="timeline-inner">
						<?php while (have_posts()) : the_post(); ?>
							<li class="item">
								<?php
								$date_diff = (strtotime(date('Y-m-d')) - strtotime(get_the_date('Y-m-d'))) / (3600 * 24);
								$new_flag = ($date_diff <= 4) ? true : false;
								?>
								<a href="<?php the_permalink(); ?>"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
									<?php $eyecatch = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); ?>
									<img class="full" src="<?php echo $eyecatch[0]; ?>" alt="">
									<dl class="update">
										<dd class="puchimoblog">
											<?php $avatar = wp_get_attachment_image_src(get_the_author_meta('my_user_avatar01'), 'thumbnail'); ?>
											<img src="<?php echo $avatar[0]; ?>" alt="" class="thum">
											<span class="name"><?php the_author_meta('nickname'); ?></span><?php echo get_the_date('Y.m.d'); ?>
										</dd>
									</dl>
									<span class="blog-ttl"><?php the_title(); ?></span>
                                    <span class="icn-new">
                                        <img class="full" src="<?php home(); ?>/common/img/sp/icn_new.png" alt="NEW">
                                    </span>
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
			<?php my_pager_sp($additional_loop->max_num_pages); ?>
		</div>
	</div><!--/.module-type01-->
	<div class="inner10"><img src="/common/img/sp/04/bnr_rule.png" alt="プチモ★ブログのルール、こちらをチェック！" class="full"></div>
	<div class="module-type01">
		<div class="module-head">
			<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/04/ttl02.png" alt="プチモ＆スーモ"></h2>
		</div>
		<div class="module-body bg-type03">
			<?php
			$args = array(
				'orderby'	=> 'ID',
				'order'		=> 'ASC',
				'role'		=> 'author',
			);
			$users = get_users($args);
			?>
			<div id="blogthum" class="cFix pt25">
				<ul>
					<?php foreach ($users as $user) : ?>
					<?php $userData = get_userdata($user->ID); ?>
					<li class="item">
						<a href="/blog/?author=<?php echo $user->ID; ?>">
							<dl>
								<?php $avatar01 = wp_get_attachment_image_src(get_the_author_meta('my_user_avatar01', $user->ID), 'thumbnail'); ?>
								<dt><img class="full" src="<?php echo $avatar01[0]; ?>" alt=""></dt>
								<dd><?php echo $user->display_name; ?></dd>
							</dl>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<!--/.module-type01--></div>
	<div class="module-type01 pt15">
		<div class="module-body bg-type03 pb10">
			<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/04/ttl03.png" alt="カレンダー"></h2>
			<div class="calendar">
				<?php get_my_calendar_sp('blog'); ?>
			</div>
			<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/04/ttl04.png" alt="最近のコメント"></h2>
			<?php $comments = get_comments(array('status' => 'approve', 'number' => 10)); ?>
			<div class="resent_comment cFix">
				<?php foreach ($comments as $comment) : ?>
					<?php $post = get_post($comment->comment_post_ID); ?>
					<p><?php echo mb_substr(str_replace(array("\r\n", "\r", "\n"), '', strip_tags($comment->comment_content)), 0, 50); ?></p>
					<p class="resent_comment_credit"><img src="<?php home(); ?>/common/img/sp/04/icn_ribbon.png" width="22" height="22"><?php comment_author(); ?></p>
					<hr class="line">
				<?php endforeach; ?>
			</div>
		</div>
		<!--/.module-type01--></div>

	<!--/#main--></article>
