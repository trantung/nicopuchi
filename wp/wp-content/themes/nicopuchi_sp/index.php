<?php
get_header();

$jsonData = getJsonData();

$disp_time_line = array_slice($jsonData, 0, ITEM_PER_TIMELINE * MORE_COUNT_PER_TIMELINE);

?>

<article id="main">
	<div id="mainvisual">
		<?php
		$args = array(
			'post_type' => 'top_mainimage',
			'posts_per_page' => 1,
		);
		$the_query = new WP_Query($args);
		?>
		<?php if ($the_query->have_posts()) : ?>
			<?php $the_query->the_post(); ?>
			<?php if (have_rows('mainimage')) : ?>
				<ul class="bxslider">
					<?php while (have_rows('mainimage')) : the_row(); ?>
						<li>
							<?php if (get_sub_field('link')) : ?>
							<a href="<?php the_sub_field('link'); ?>" target="_<?php the_sub_field('window'); ?>">
								<?php endif; ?>
								<?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
								<img class="full" src="<?php echo $image[0]; ?>" alt="<?php the_sub_field('alt'); ?>">
								<?php if (get_sub_field('link')) : ?>
							</a>
						<?php endif; ?>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
		<div class="slider-selector">
			<?php
			$args = array(
				'post_type' => 'top_mainimage',
				'posts_per_page' => 1,
			);
			$the_query = new WP_Query($args);
			?>
			<?php if ($the_query->have_posts()) : ?>
				<?php $the_query->the_post(); ?>
				<?php if (have_rows('mainimage')) : ?>
					<ul class="bx-pager">
						<?php $flag = 0; while (have_rows('mainimage')) : the_row(); ?>
							<li>
								<a data-slide-index="<?php echo $flag; ?>" href="">
									<?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'thumbnail'); ?>
									<img class="thumbsnail full" src="<?php echo $image[0]; ?>">
									<img class="cover full" src="/common/img/sp/index/img_cover.png">
								</a>
							</li>
						<?php $flag ++; endwhile; ?>
					</ul>
				<?php endif; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<!--/#mainvisual--></div>
	<div class="module-type01">
		<div class="module-head">
			<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/index/ttl01.png" alt="ニコ☆プチ読者ブログサポーター"></h2>
		</div>
		<div class="module-body bg-type01">
			<div id="blogsupporter" class="slider-area">
				<ul class="slider-type02 index-list">
					<li>
						<a href="" class="new">
							<img class="full" src="/common/img/pc/index/img_sample01a.png" alt="">
							<span class="update">2014.08.14<span class="icn-new"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="model-name">モデル名</span>
						</a>
					</li>
					<li>
						<a href="" class="new">
							<img class="full" src="/common/img/pc/index/img_sample01b.png" alt="">
							<span class="update">2014.08.14<span class="icn-new"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="model-name">モデル名</span>
						</a>
					</li>
					<li>
						<a href="">
							<img class="full" src="/common/img/pc/index/img_sample01a.png" alt="">
							<span class="update">2014.08.14<span class="icn-new"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="model-name">モデル名</span>
						</a>
					</li>
					<li>
						<a href="">
							<img class="full" src="/common/img/pc/index/img_sample01b.png" alt="">
							<span class="update">2014.08.14<span class="icn-new"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="model-name">モデル名</span>
						</a>
					</li>
					<li>
						<a href="">
							<img class="full" src="/common/img/pc/index/img_sample01a.png" alt="">
							<span class="update">2014.08.14<span class="icn-new"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="model-name">モデル名</span>
						</a>
					</li>
					<li>
						<a href="">
							<img class="full" src="/common/img/pc/index/img_sample01b.png" alt="">
							<span class="update">2014.08.14<span class="icn-new"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="model-name">モデル名</span>
						</a>
					</li>
					<li>
						<a href="">
							<img class="full" src="/common/img/pc/index/img_sample01a.png" alt="">
							<span class="update">2014.08.14<span class="icn-new"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="model-name">モデル名</span>
						</a>
					</li>
					<li>
						<a href="">
							<img class="full" src="/common/img/pc/index/img_sample01b.png" alt="">
							<span class="update">2014.08.14<span class="icn-new"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="model-name">モデル名</span>
						</a>
					</li>
				</ul>
				<a href="" class="btn type01 tx_c mt10"><span class="tx12">一覧</span></a>
				<!--/#blogSupporter--></div>
		</div>
		<!--/.module-type01--></div>
	<ul class="bnr-area">
		<li><a href=""><img class="full" src="/common/img/sp/bnr_sample01.png" alt="" ></a></li>
	</ul>
	<div class="module-type01">
		<div class="module-head">
			<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/index/ttl02.png" alt="ニコ☆プチタイムライン"></h2>
		</div>
		<div class="module-body bg-type02">
			<div id="timeline">
				<ul class="timeline-inner">
					<?php foreach ($jsonData as $key => $blogData) : ?>
					<?php if ($key < 10) : ?>
					<li class="item">
						<a href="<?php echo $blogData['title_link']; ?>" class="new">
							<img class="full" src="<?php echo $blogData['image']; ?>" alt="">
							<dl class="update">
								<dt><img class="full" src="/common/img/sp/<?php echo $blogData['blog_image']; ?>" alt="プチモ☆ブログ情報"></dt>
								<dd><?php echo date('Y m d | g:i a', $blogData['date']); ?></dd>
							</dl>
							<span class="blog-ttl"><?php echo $blogData['title']; ?></span>
							<?php if ($blogData['date'] == strtotime(date('Y-m-d'))) : ?>
							<span class="icn-new"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span>
							<?php endif; ?>
						</a>
					</li>
					<?php endif; ?>
					<?php endforeach; ?>
				</ul>
				<a href="<?php echo home_url('timeline');?>" class="btn type01 tx_c mt10"><span class="tx12">一覧</span></a>
				<!--/#timeline--></div>
		</div>
		<!--/.module-type01--></div>
	<div class="module-type01">
		<div class="module-head">
			<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/index/ttl03.png" alt="プチニュー10"></h2>
		</div>
		<div class="module-body bg-type04 inner10">
			<?php
			$args = array(
				'post_type' => 'puchinew',
				'post_per_page' => 10,
			);
			$the_query = new WP_Query($args);
			?>
			<?php if ($the_query->have_posts()) : ?>
				<ul id="puchinew10" class="index-list-type02">
					<?php while ($the_query->have_posts()) : ?>
						<?php $the_query->the_post(); ?>
						<li>
							<?php
							$date_diff = (strtotime(date('Y-m-d')) - strtotime(get_the_date('Y-m-d'))) / (3600 * 24);
							$new_flag = ($date_diff <= 4) ? true : false;
							?>
							<?php if (get_the_content()) : ?>
							<a href="<?php the_permalink(); ?>"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
								<?php elseif (get_field('link')) : ?>
								<a href="<?php the_field('link'); ?>" target="_<?php the_field('window'); ?>"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
									<?php else : ?>
									<a href="#"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
										<?php endif; ?>
										<dl>
											<dt>
												<?php the_post_thumbnail(array(88,0)); ?>
												<span class="date"><?php echo get_the_date('Y.m.d'); ?></span>
											</dt>
											<dd>
												<p class="desc">
													<?php the_title(); ?>
												</p>
											</dd>
										</dl>
										<span class="icn-new"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span>
									</a>
						</li>
					<?php endwhile; ?>
					<!--/#puchinew10--></ul>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<!--/.module-type01--></div>
	<div class="module-type01">
		<div class="module-head">
			<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/index/ttl04.png" alt="プチモ☆ブログ"></h2>
		</div>
		<div class="module-body bg-type03">
			<div id="puchiblog" class="slider-area">
				<?php
				$args = array(
					'category_name' => 'blog',
					'post_per_page' => 8,
				);
				$the_query = new WP_Query($args);
				?>
				<?php if ($the_query->have_posts()) : ?>
					<ul class="slider-type02 index-list">
						<?php while ($the_query->have_posts()) : ?>
							<?php $the_query->the_post(); ?>
							<li>
								<?php
								$date_diff = (strtotime(date('Y-m-d')) - strtotime(get_the_date('Y-m-d'))) / (3600 * 24);
								$new_flag = ($date_diff <= 4) ? true : false;
								?>
								<a href="<?php the_permalink(); ?>" class="new">
									<?php the_post_thumbnail(array(140,94)); ?>
									<span class="update"><?php echo get_the_date('Y.m.d'); ?><?php if ($new_flag) : ?><span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span><?php endif; ?></span>
									<span class="blog-ttl"><?php the_title(); ?></span>
									<span class="model-name type02"><?php the_author(); ?></span>
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
				<a href="<?php home(); ?>/blog" class="btn type01 tx_c mt10"><span class="tx12">一覧</span></a>
				<!--/#puchiblog--></div>
		</div>
		<!--/.module-type01--></div>
	<div class="module-type01">
		<div class="module-head">
			<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/index/ttl05.png" alt="スーパー読モブログ"></h2>
		</div>
		<div class="module-body bg-type01">
			<div id="readersblog" class="slider-area">
				<ul class="slider-type02 index-list">
					<li>
						<a href="">
							<img class="full" src="/common/img/pc/index/img_sample07a.png" alt="上野沙耶香">
							<span class="update">2015.00.00<span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
							<span class="blog-theme">上野 沙耶香 &copy;</span>
						</a>
					</li>
					<li>
						<a href="">
							<img class="full" src="/common/img/pc/index/img_sample07b.png" alt="斉藤梨鈴">
							<span class="update">2015.00.00<span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
							<span class="blog-theme">斉藤 梨鈴 &copy;</span>
						</a>
					</li>
					<li>
						<a href="">
							<img class="full" src="/common/img/pc/index/img_sample07c.png" alt="大森汐莉">
							<span class="update">2015.00.00<span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
							<span class="blog-theme">大森 汐莉 &copy;</span>
						</a>
					</li>
					<li>
						<a href="">
							<img class="full" src="/common/img/pc/index/img_sample07d.png" alt="石田結耶">
							<span class="update">2015.00.00<span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
							<span class="blog-theme">石田 結耶 &copy;</span>
						</a>
					</li>
					<li>
						<a href="">
							<img class="full" src="/common/img/pc/index/img_sample07e.png" alt="角紫音">
							<span class="update">2015.00.00<span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
							<span class="blog-theme">角 紫音 &copy;</span>
						</a>
					</li>
					<li>
						<a href="">
							<img class="full" src="/common/img/pc/index/img_sample07f.png" alt="武内愛莉">
							<span class="update">2015.00.00<span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span>
							<span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
							<span class="blog-theme">武内 愛莉 &copy;</span>
						</a>
					</li>
				</ul>
				<a href="" class="btn type01 tx_c mt10"><span class="tx12">一覧</span></a>
				<!--/#readersblog--></div>
		</div>
		<!--/.module-type01--></div>
	<!--/#main--></article>

<?php
get_footer();
?>
