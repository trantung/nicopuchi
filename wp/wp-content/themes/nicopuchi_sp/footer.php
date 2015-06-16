<?php
/**
 * フッタ
 **/
?>
<?php include(dirname(__FILE__).'/../../../../common/inc/sp/footer.html'); ?>
<script type="text/javascript" src="/common/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/common/js/selectivizr-min.js"></script>
<script type="text/javascript" src="/common/js/script_sp.js"></script>
<script type="text/javascript" src="/common/js/jquery.bxslider.js"></script>
<script type="text/javascript" src="/common/js/jquery.easing.1.3.js"></script>
<script type="text/javascript">
$(function() {
	var slider = $('.bxslider').bxSlider({
		auto: true,
		infinite: true,
		pause: 5000,
		speed: 1000,
		mode: 'horizontal',
		prevText: '<',
		nextText: '>',
		pager: true,
		//easing: 'easeOutBounce',
		pagerCustom: '.bx-pager'
	});
});
</script>
<script type="text/javascript" src="/common/js/slick.js"></script>
<script>
$("document").ready(function(){
	$('#blogsupporter .slider-type02').slick({
		infinite: true,
		autoplay:true,
		dots:true,
		slidesToShow: 3,
		slidesToScroll: 1
	});
	$('#puchiblog .slider-type02,#readersblog .slider-type02').slick({
		infinite: true,
		autoplay:true,
		dots:true,
		slidesToShow: 2,
		slidesToScroll: 1
	});
});
</script>
<script type="text/javascript" src="/common/js/jquery.heightLine.js"></script>
<script type="text/javascript" src="/common/js/jquery.magnific-popup.min.js"></script>
<script>
	$(function(){
		$("#newest").magnificPopup({
			delegate: 'a',
			type: 'image',
			gallery: {
				enabled: true
			}
		});
		$("#timeline_issue ul li").each(function(){
			$(this).magnificPopup({
				delegate: 'a',
				type: 'image',
				gallery: {
					enabled: true
				}
			});
		});
	});
</script>
</body>
</html>
