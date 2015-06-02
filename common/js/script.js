(function($) {

	//ロールオーバーボタン画像透過
	$("a.fdb,input.fdb").click(function (){})
		.hover(function () {
			$(this).animate( { opacity:0.7 }, { queue:false, duration:100 } );
			}, function () {
			$(this).animate( { opacity:1 }, { queue:false, duration:200 } );
	});

	//ロールオーバーボタン画像変更
	$('a img.ov').hover(function(){
		$(this).attr('src', $(this).attr('src').replace('_off', '_on'));
		}, function(){
			if (!$(this).hasClass('currentPage')) {
			$(this).attr('src', $(this).attr('src').replace('_on', '_off'));
		}
	});

	//スムーズスクロール
	$("a[href^=#]").click(function(){
		var Hash = $(this.hash);
		var HashOffset = $(Hash).offset().top;
		$("html,body").animate({
		scrollTop: HashOffset
		}, 300,"swing");
		return false;
	});

	//スマホ用ページトップ
	$(".pagetop").hide();
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 300) {
				$('.pagetop').fadeIn();
			} else {
				$('.pagetop').fadeOut();
			}
		});

		$('.pagetop a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
	});

	//accordion
	var x = 640;
	var spflag = false;
	var doAccordion = function(){
		var w = $(window).width();
		if (w <= x) {
			$('.acd-area').css({
				display: 'none'
			});
			if(!spflag){
				$(".trg").click(function(){
					console.log("b");
					$(this).next(".acd-area").slideToggle();
					if(!$(this).hasClass("open")){
						$(this).addClass('open');
					}else{
						$(this).removeClass("open");
					}
				});
				spflag =true;
			}
		} else {
			$('.acd-area').css({
				display: 'block'
			});
		}
	}
	var timer = false;
	$(window).resize(function() {
		if (timer !== false) {
			clearTimeout(timer);
		}
		timer = setTimeout(function() {
			doAccordion();
			console.log('resized');
		}, 100);
	});
	doAccordion();

	//gnavカレント機能
	$(document).ready(function() {
		var activeUrl = location.pathname.split("/")[1];
			navList = $(".nav-gloval").find("a.gnav");

		navList.each(function(){
			if( $(this).attr("href").split("/")[1] == activeUrl ) {
			$(this).parent().addClass("active");
			};
		});
	});

	$('a.gnav.company,a.gnav.recruit').click(function(){
		return false;
	})

	//formのテキスト変換
	var supportIMEMode = ('ime-mode' in document.body.style);

	// 1バイト文字専用フィールド
	jQuery('.sbc_field')
	// ime-modeが使えないブラウザ：入力、フォーカスアウト
	.on('keydown blur', function() {

		// ime-modeが使えるならスキップ
		if (supportIMEMode) return;

		// 2バイト文字が入力されたら削除
		var target = jQuery(this);
		window.setTimeout( function() {
			var v = target.val();
			target.val( filterMBC(v) );

		}, 1);
	})
	// 全ブラウザ：貼り付け
	.on('paste', function() {
		// 2バイト文字が入力されたら削除
		var target = jQuery(this);
		window.setTimeout( function() {
			var v = target.val();
			target.val( filterMBC(v) );

		}, 1);
	})
	;

	// 日本語(マルチバイト文字)を削除した値を返す
	function filterMBC(src){
		var str = '';
		src = escape(src);
		for(i = 0; i < src.length; i++){
			var chr = src.charAt(i);
			if(chr == '%'){
				var nchr = src.charAt(++i);
				if(nchr == 'u'){
					// 2バイト文字をスキップ
					i += 4;
				} else {
					// 1バイト文字を追加
					str += chr
					str += nchr
					str += src.charAt(++i);
				}
				continue;
			}
			str += chr;
		}
		return unescape(str);
	}

})(jQuery);

