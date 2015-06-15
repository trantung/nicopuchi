

<article id="main">
	<ul class="dir-path cFix">
		<li><a href="">TOP</a>></li>
		<li>ページタイトル</li>
	</ul>
	<div class="module-type01">
		<div class="module-body bg-type03 inner10">
			<div class="module-head">
				<h2 class="module-head-ttl mb10"><img class="full" src="<?php home(); ?>/common/img/sp/04/ttl01.png" alt="プチモ☆ブログ"></h2>
			</div>
			<?php if (have_posts()) : the_post(); ?>
				<div class="blogname cFix">
					<table>
						<tr>
							<th scope="row" class="blog_ph">
								<?php $avatar02 = wp_get_attachment_image_src(get_the_author_meta('my_user_avatar02'), 'thumbnail'); ?>
								<img src="<?php echo $avatar02[0]; ?>">
							</th>
							<td><div class="arrow_box"> <span class="name"><?php the_author(); ?></span>の<span class="pink">ブログ</span> </div></td>
						</tr>
					</table>
					<div>
					</div>
				</div>
				<div id="puchiblog">
					<div class="entry cFix">
						<h3 class="entry_ttl"><?php the_title(); ?></h3>
						<dl class="entry_header cFix">
							<dt> <img class="full thum" src="<?php home(); ?>/common/img/sp/04/blog_face_ph.jpg" alt=""></dt>
							<dd>
								<p class="date"><?php echo get_the_date('Y.m.d Ag:i'); ?></p>
								<p class="name"><?php the_author(); ?>..&copy;</p>
							</dd>
						</dl>
						<div class="entry_body">
							<?php the_content(); ?>
						</div>
						<ul class="pageNav01">
							<li class="fl_l"><a href="#"><img src="/common/img/sp/arrow_L.jpg" width="12" height="12"></a></li>
							<li><a href="#"><?php the_author(); ?>の記事一覧</a></li>
							<li class="fl_r"><a href="#"><img src="/common/img/sp/arrow_R.jpg" width="12" height="12"></a></li>
						</ul>
						<a href="<?php home(); ?>/blog/" class="btn type02 tx_c mt10 mb20"><span class="tx12"><img src="<?php home(); ?>/common/img/sp/04/icn_arrow.jpg" width="32" height="22">プチモブログ一覧</span></a>
						<p class="comment_ttl">コメント</p>
						<p class="tx11">ニコ☆プチに会員登録すると、 <br>
							コメント投稿できるよ</p>
						<br clear="all">
						<a href="" class="btn type03 tx_c fl_l"><span class="tx12">会員登録</span></a> <a href="" class="btn type03 tx_c fl_r"><span class="tx12">ログイン</span></a>
						<!--/entry--></div>
					<div class="comment">
						<div class="comment_head"><img src="../common/img/sp/04/icn_comment.gif" width="25" height="20">コメント（6）</div>
						<p>メルちゃん。</p>
						<p>ご卒業おめでとうございます＊</p>
						<p>&nbsp;</p>
						<p>これからもお仕事頑張ってください。</p>
						<p>&nbsp;</p>
						<p>大好きだよ </p>
						<p class="comment_credit">れんか♪ © 　|　 2015年5月 1日</p>
						<hr class="line">
						<p>めるｃへ。</p>
						<p>&nbsp;</p>
						<p>卒業おめでとう！</p>
						<p>とうとう最後のブログになっちゃったね。。。</p>
						<p>&nbsp;</p>
						<p>いつもコメント返しありがとうね。</p>
						<p>嬉しかったよ！</p>
						<p>&nbsp;</p>
						<p>毎回ニコプチを開くと、いつもそこに笑顔のめるｃがいた。</p>
						<p>その笑顔に何度励まされたかな。。。</p>
						<p>ありがとう。大好きだよ。</p>
						<p>めるｃの卒業は、ほんっっとに悲しいし寂しい。</p>
						<p>でも、めるｃや卒モのみんながいたからこそ</p>
						<p>ニコプチは輝いてた。</p>
						<p>めっちゃキラキラしてた☆彡</p>
						<p>&nbsp;</p>
						<p>めるｃは、絶対に夢をかなえられる！</p>
						<p>こえからも自分を信じて頑張ってね！</p>
						<p>&nbsp;</p>
						<p>大好き！</p>
						<p>ファンレ送ったから、お返事くれると嬉しいな♪</p>
						<p>頑張って絵もかいたよ～笑</p>
						<p>&nbsp;</p>
						<p>じゃあ。。。byebye♪</p>
						<p class="comment_credit">れんか♪ © 　|　 2015年5月 1日</p>
						<!--/entry--></div>
					<!--/#puchiblog--></div>
			<?php endif; ?>
		</div>
		<!--/.module-type01--></div>
	<div class="module-type01">
		<div class="module-head">
			<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/index/ttl04.png" alt="プチモ☆ブログ"></h2>
		</div>
		<div class="module-body bg-type03">
			<div id="puchiblog" class="slider-area">
				<ul class="slider-type02 index-list">
					<li>
						<a href="" class="new">
							<img class="full" src="/common/img/pc/index/img_sample03a.png" alt="">
                                <span class="update">2014.08.14
                                    <span class="icn-new type02">
                                        <img class="full" src="/common/img/sp/icn_new.png" alt="NEW">
                                    </span>
                                </span>
							<span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入ります</span>
							<span class="model-name type02">モデル名が入ります。</span>
						</a>
					</li>
					<li> <a href="" class="new"> <img class="full" src="/common/img/pc/index/img_sample03b.png" alt=""> <span class="update">2014.08.14<span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span> <span class="blog-ttl">タイトルが入ります</span> <span class="model-name type02">モデル名が入ります。</span> </a> </li>
					<li> <a href=""> <img class="full" src="/common/img/pc/index/img_sample03a.png" alt=""> <span class="update">2014.08.14<span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span> <span class="blog-ttl">タイトルが入りますタイトルが入ります</span> <span class="model-name type02">モデル名が入ります。</span> </a> </li>
					<li> <a href=""> <img class="full" src="/common/img/pc/index/img_sample03b.png" alt=""> <span class="update">2014.08.14<span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span> <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入ります</span> <span class="model-name type02">モデル名が入ります。</span> </a> </li>
					<li> <a href=""> <img class="full" src="/common/img/pc/index/img_sample03a.png" alt=""> <span class="update">2014.08.14<span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span> <span class="blog-ttl">タイトルが入りますタイトルが入ります</span> <span class="model-name type02">モデル名が入ります。</span> </a> </li>
					<li> <a href=""> <img class="full" src="/common/img/pc/index/img_sample03b.png" alt=""> <span class="update">2014.08.14<span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span> <span class="blog-ttl">タイトルが入ります</span> <span class="model-name type02">モデル名が入ります。</span> </a> </li>
					<li> <a href=""> <img class="full" src="/common/img/pc/index/img_sample03a.png" alt=""> <span class="update">2014.08.14<span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span> <span class="blog-ttl">モデル名が入ります。</span> <span class="model-name type02">モデル名が入ります。</span> </a> </li>
					<li> <a href=""> <img class="full" src="/common/img/pc/index/img_sample03b.png" alt=""> <span class="update">2014.08.14<span class="icn-new type02"><img class="full" src="/common/img/sp/icn_new.png" alt="NEW"></span></span> <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span> <span class="model-name type02">モデル名が入ります。</span> </a> </li>
				</ul>
				<a href="" class="btn type01 tx_c mt10"><span class="tx12">一覧</span></a>
				<!--/#puchiblog--></div>
		</div>
		<!--/.module-type01--></div>
	<div class="inner10"><img src="/common/img/sp/04/bnr_rule.png" alt="プチモ★ブログのルール、こちらをチェック！" class="full"></div>
	<div class="module-type01">
		<div class="module-head">
			<h2 class="module-head-ttl"><img class="full" src="/common/img/sp/04/ttl02.png" alt="プチモ＆スーモ"></h2>
		</div>
		<div class="module-body bg-type03">
			<div id="blogthum" class="cFix pt25">
				<ul>
					<li class="item"> <a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a> </li>
					<li class="item"> <a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample04.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a> </li>
					<li class="item"> <a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a> </li>
					<li class="item"> <a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample04.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a> </li>
					<li class="item"> <a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a> </li>
					<li class="item"> <a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample04.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a> </li>
					<li class="item"> <a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a> </li>
					<li class="item"> <a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample04.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a> </li>
					<li class="item"> <a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a> </li>
					<li class="item"> <a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample04.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a> </li>
					<li class="item"> <a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a> </li>
					<li class="item"> <a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample04.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a> </li>
					<li class="item"> <a href="">
							<dl>
								<dt><img class="full" src="/common/img/sp/04/sample03.jpg" alt=""></dt>
								<dd>モデル名</dd>
							</dl>
						</a> </li>
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
