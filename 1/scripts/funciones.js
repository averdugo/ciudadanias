/*CSS Browser Selector v0.3.4 (Sep 29, 2009)*/
function css_browser_selector(u){var ua = u.toLowerCase(),is=function(t){return ua.indexOf(t)>-1;},g='gecko',w='webkit',s='safari',o='opera',h=document.getElementsByTagName('html')[0],b=[(!(/opera|webtv/i.test(ua))&&/msie\s(\d)/.test(ua))?('ie ie'+RegExp.$1):is('firefox/2')?g+' ff2':is('firefox/3.5')?g+' ff3 ff3_5':is('firefox/3')?g+' ff3':is('gecko/')?g:is('opera')?o+(/version\/(\d+)/.test(ua)?' '+o+RegExp.$1:(/opera(\s|\/)(\d+)/.test(ua)?' '+o+RegExp.$2:'')):is('konqueror')?'konqueror':is('chrome')?w+' chrome':is('iron')?w+' iron':is('applewebkit/')?w+' '+s+(/version\/(\d+)/.test(ua)?' '+s+RegExp.$1:''):is('mozilla/')?g:'',is('j2me')?'mobile':is('iphone')?'iphone':is('ipod')?'ipod':is('mac')?'mac':is('darwin')?'mac':is('webtv')?'webtv':is('win')?'win':is('freebsd')?'freebsd':(is('x11')||is('linux'))?'linux':'','js']; c = b.join(' '); h.className += ' '+c; return c;}; css_browser_selector(navigator.userAgent);

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

/****************/
function toggler(obj) {
	var el = document.getElementById(obj);
	if ( el.style.display != 'none' ) {
		el.style.display = 'none';
	}
	else {
		el.style.display = '';
	}
}
/****************/
function ShowHide(LayerName,TotalLayers){//v1.0
	var temp = new Array();
	temp = LayerName.split('_');
	ReLayerName = temp[0];
	
		for (i=1;i<=TotalLayers;i++){
		document.getElementById(ReLayerName+'_'+i).style.display = 'none';
		}
	document.getElementById(LayerName).style.display = 'block';
}
/****************/
function LinkClasses(IDlink,TotalLinks,OFF,ON){//v1.0
	var temp = new Array();
	temp = IDlink.split('_');
	ReIDlink = temp[0];

		for (i=1;i<=TotalLinks;i++){
		document.getElementById(ReIDlink+'_'+i).className = OFF;
		}
	document.getElementById(IDlink).className = ON;
}
/*SIZER*/
function increaseFontSize(obj) {
	var className = getClassName(obj);
	if ('small' == className) {
		d(obj).className = 'normal';
	}else if ('normal' == className) {
		d(obj).className = 'large';
	}else if ('large' == className) {
		d(obj).className = 'large-x';
	}else if ('small-x' == className) {
		d(obj).className = 'small';
	}
}

function decreaseFontSize(obj) {
	var className = getClassName(obj);
	if ('normal' == className) {
		d(obj).className = 'small';
	}else if ('large' == className) {
		d(obj).className = 'normal';
	}else if ('large-x' == className) {
		d(obj).className = 'large';
	}else if ('small' == className) {
		d(obj).className = 'small-x';
	}
}

function getClassName(obj) {
  return d(obj).className;
}

function d(id) {
  return document.getElementById(id);
}
/****************/
/* Modified to support Opera */
function bookmarksite(title,url){
if (window.sidebar) // firefox
	window.sidebar.addPanel(title, url, "");
else if(window.opera && window.print){ // opera
	var elem = document.createElement('a');
	elem.setAttribute('href',url);
	elem.setAttribute('title',title);
	elem.setAttribute('rel','sidebar');
	elem.click();
} 
else if(document.all)// ie
	window.external.AddFavorite(url, title);
}
/********IE6 BUG***********/
if (document.all && !window.opera && !window.XMLHttpRequest) {
	document.execCommand("BackgroundImageCache",false,true);
}
/*****jQUERY*****/
function equalHeight(group) {
	tallest = 0;
	group.each(function() {
		thisHeight = $(this).height();
		if(thisHeight > tallest) {
			tallest = thisHeight;
		}
	});
	group.height(tallest);
}
/****W3C HIDDEN STYLES****/
document.write('<style type="text/css">');
document.write('HTML {overflow:-moz-scrollbars-vertical;}');
document.write('DIV, IMG, A {behavior: url("css/iepngfix.htc");}');
document.write('</style>');