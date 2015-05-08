if ((navigator.userAgent.indexOf('iPhone') > 0) || navigator.userAgent.indexOf('iPod') > 0 || navigator.userAgent.indexOf('Android') > 0) {
		document.write('<meta name="viewport" content="width=device-width;target-densitydpi=medium-dpi, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">');
	}else{
		document.write('<meta name="viewport" content="width=1090">');
}