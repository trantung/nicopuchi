<?php
/**
 * ブログ
 **/
?>

<article id="main">
	<ul class="dir-path cFix">
		<li><a href="">TOP</a>></li>
		<li>ページタイトル</li>
	</ul>
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
			<ul class="pageNav01">
				<li><span>1</span></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li>…</li>
				<li><a href="#">16</a></li>
				<li><a href="#"><img src="../common/img/sp/arrow_R.jpg" width="12" height="12"></a></li>
			</ul>
		</div>
	</div><!--/.module-type01-->
	<div class="inner10"><img src="/common/img/sp/04/bnr_rule.png" alt="プチモ★ブログのルール、こちらをチェック！" class="full"></div>
	<div class="module-type01">
		<div class="module-head">
			<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/04/ttl02.png" alt="プチモ＆スーモ"></h2>
		</div>
		<div class="module-body bg-type03">
			<div id="blogthum" class="cFix pt25">
				<ul>
					<li class="item">
						<a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a>
					</li>
					<li class="item">
						<a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample04.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a>
					</li>
					<li class="item">
						<a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a>
					</li>
					<li class="item">
						<a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample04.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a>
					</li>
					<li class="item">
						<a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a>
					</li>
					<li class="item">
						<a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample04.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a>
					</li>
					<li class="item">
						<a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a>
					</li>
					<li class="item">
						<a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample04.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a>
					</li>
					<li class="item">
						<a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a>
					</li>
					<li class="item">
						<a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample04.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a>
					</li>
					<li class="item">
						<a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a>
					</li>
					<li class="item">
						<a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample04.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a>
					</li>
					<li class="item">
						<a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a>
					</li>
				</ul>
			</div>
		</div>
	<!--/.module-type01--></div>
	<div class="module-type01 pt15">
		<div class="module-body bg-type03 pb10">
		<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/04/ttl03.png" alt="カレンダー"></h2>
		<div class="calendar">
			<div class="calendar_header cFix">
			<ul class="pageNav03">
				<li class="fl_l"><a href="#"><img src="/common/img/sp/04/icn_cal_l.gif" width="22" height="22"></a></li>
				<li>4月</li>
				<li class="fl_r"><a href="#"><img src="/common/img/sp/04/icn_cal_r.gif" width="22" height="22"></a></li>
			</ul>
			</div>
			<table class="calendar_body">
			<tr>
				<th scope="col" class="sun">日</th>
				<th scope="col">月</th>
				<th scope="col">火</th>
				<th scope="col">水</th>
				<th scope="col">木</th>
				<th scope="col">金</th>
				<th scope="col" class="sat">土</th>
			</tr>
			<tr>
				<td class="gray">23</td>
				<td class="gray">24</td>
				<td class="gray">25</td>
				<td class="gray">26</td>
				<td class="gray">27</td>
				<td class="gray">28</td>
				<td>1</td>
			</tr>
			<tr>
				<td class="sun"><a href="#">2</a></td>
				<td><a href="#">3</a></td>
				<td><a href="#">4</a></td>
				<td><a href="#">5</a></td>
				<td><a href="#">6</a></td>
				<td><a href="#">7</a></td>
				<td><a href="#">8</a></td>
			</tr>
			<tr>
				<td class="sun"><a href="#">9</a></td>
				<td><a href="#">10</a></td>
				<td><a href="#">11</a></td>
				<td><a href="#">12</a></td>
				<td><a href="#">13</a></td>
				<td><a href="#">14</a></td>
				<td><a href="#">15</a></td>
			</tr>
			<tr>
				<td class="sun"><a href="#">16</a></td>
				<td><a href="#">17</a></td>
				<td><a href="#">18</a></td>
				<td><a href="#">19</a></td>
				<td><a href="#">20</a></td>
				<td><a href="#">21</a></td>
				<td><a href="#">22</a></td>
			</tr>
			<tr>
				<td class="sun"><a href="#">23</a></td>
				<td><a href="#">24</a></td>
				<td><a href="#">25</a></td>
				<td><a href="#">26</a></td>
				<td><a href="#">27</a></td>
				<td><a href="#">28</a></td>
				<td><a href="#">29</a></td>
			</tr>
			<tr>
				<td class="sun">30</td>
				<td>31</td>
				<td class="gray">1</td>
				<td class="gray">2</td>
				<td class="gray">3</td>
				<td class="gray">4</td>
				<td class="gray">5</td>
			</tr>
			</table>
		</div>
		<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/04/ttl04.png" alt="最近のコメント"></h2>
		<div class="resent_comment cFix">
			<p>まちにまったスズナちゃんのブログがきたーー（＾Ｏ＾☆♪プチコレ5お疲れ様です♪残念ながら私はプチコレ5出れませんでした来年がラストチャン…</p>
			<p class="resent_comment_credit"><img src="../common/img/sp/04/icn_ribbon.png" width="22" height="22">つきみ ©</p>
			<hr class="line">
			<p>涼凪ちゃん、友達からの質問です！質問好きなキャラクターは？です！ぜひ、答えてね♡</p>
			<p class="resent_comment_credit"><img src="../common/img/sp/04/icn_ribbon.png" width="22" height="22">わわ ©</p>
			<hr class="line">
			<p>まちにまったスズナちゃんのブログがきたーー（＾Ｏ＾☆♪プチコレ5お疲れ様です♪残念ながら私はプチコレ5出れませんでした来年がラストチャン…</p>
			<p class="resent_comment_credit"><img src="../common/img/sp/04/icn_ribbon.png" width="22" height="22">つきみ ©</p>
			<hr class="line">
			<p>涼凪ちゃん、友達からの質問です！質問好きなキャラクターは？です！ぜひ、答えてね♡</p>
			<p class="resent_comment_credit"><img src="../common/img/sp/04/icn_ribbon.png" width="22" height="22">わわ ©</p>
			<hr class="line">
			<p>まちにまったスズナちゃんのブログがきたーー（＾Ｏ＾☆♪プチコレ5お疲れ様です♪残念ながら私はプチコレ5出れませんでした来年がラストチャン…</p>
			<p class="resent_comment_credit"><img src="../common/img/sp/04/icn_ribbon.png" width="22" height="22">つきみ ©</p>
			<hr class="line">
			<p>涼凪ちゃん、友達からの質問です！質問好きなキャラクターは？です！ぜひ、答えてね♡</p>
			<p class="resent_comment_credit"><img src="../common/img/sp/04/icn_ribbon.png" width="22" height="22">わわ ©</p>
			<hr class="line">
			<p>まちにまったスズナちゃんのブログがきたーー（＾Ｏ＾☆♪プチコレ5お疲れ様です♪残念ながら私はプチコレ5出れませんでした来年がラストチャン…</p>
			<p class="resent_comment_credit"><img src="../common/img/sp/04/icn_ribbon.png" width="22" height="22">つきみ ©</p>
			<hr class="line">
			<p>涼凪ちゃん、友達からの質問です！質問好きなキャラクターは？です！ぜひ、答えてね♡</p>
			<p class="resent_comment_credit"><img src="../common/img/sp/04/icn_ribbon.png" width="22" height="22">わわ ©</p>
			<hr class="line">
			<p>まちにまったスズナちゃんのブログがきたーー（＾Ｏ＾☆♪プチコレ5お疲れ様です♪残念ながら私はプチコレ5出れませんでした来年がラストチャン…</p>
			<p class="resent_comment_credit"><img src="../common/img/sp/04/icn_ribbon.png" width="22" height="22">つきみ ©</p>
			<hr class="line">
			<p>涼凪ちゃん、友達からの質問です！質問好きなキャラクターは？です！ぜひ、答えてね♡</p>
			<p class="resent_comment_credit"><img src="../common/img/sp/04/icn_ribbon.png" width="22" height="22">わわ ©</p>
		</div>
		</div>
	<!--/.module-type01--></div>

<!--/#main--></article>