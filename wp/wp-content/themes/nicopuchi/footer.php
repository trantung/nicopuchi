<?php
/**
 * フッター
 */
?>



<?php include(dirname(__FILE__).'/../../../../common/inc/pc/puchicore5.html'); ?>



<?php include(dirname(__FILE__).'/../../../../common/inc/pc/footer.html'); ?>



<script type="text/javascript" src="/common/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/common/js/selectivizr-min.js"></script>
<script type="text/javascript" src="/common/js/script.js"></script>
<script type="text/javascript" src="/common/js/slick.js"></script>
<script>
$("document").ready(function(){
	$('#mainvisual ul').slick({
		infinite: true,
		autoplay:true,
		dots:true,
		slidesToShow: 1,
		slidesToScroll: 1
	});
	$('.slider-type02').slick({
		infinite: true,
		autoplay:true,
		dots:true,
		slidesToShow: 5,
		slidesToScroll: 1
	});
});
</script>
<script type="text/javascript" src="/common/js/easyselectbox.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('.design-select-box').easySelectBox();
	})
</script>
<script type="text/javascript" src="/common/js/masonry.pkgd.min.js"></script>
<script>
	$(function(){
		$('.masonry-inner').masonry();
	})
</script>
<script type="text/javascript" src="/common/js/jquery.heightLine.js"></script>
<script>
	$("#blogsupporter li a,#blogsupporter li .no-link").heightLine(0);
	$("#puchiblog li a").heightLine(1);
</script>
<script type="text/javascript" src="/common/js/jquery.magnific-popup.min.js"></script>
<script>
	$(function(){
		$("#main .new-magazine").magnificPopup({
			delegate: 'a',
			type: 'image',
			gallery: {
				enabled: true
			}
		});
		$("#main #backNumber li").each(function(){
			$(this).magnificPopup({
				delegate: 'a',
				type: 'image',
				gallery: {
					enabled: true
				}
			});
		});
		$(".new-magazine-left img.bd-pink").css("cursor","pointer").on("click", function(){
			$('.new-magazine-left .btn-area a').click();
		});
	});
</script>
<?php wp_footer(); ?>
</body>
</html>