/*!
 * classie v1.0.1
 * class helper functions
 * from bonzo https://github.com/ded/bonzo
 * MIT license
 *
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true, unused: true */
/*global define: false, module: false */

( function( window ) {

	'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

	function classReg( className ) {
		return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
	}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
	var hasClass, addClass, removeClass;

	if ( 'classList' in document.documentElement ) {
		hasClass = function( elem, c ) {
			return elem.classList.contains( c );
		};
		addClass = function( elem, c ) {
			elem.classList.add( c );
		};
		removeClass = function( elem, c ) {
			elem.classList.remove( c );
		};
	}
	else {
		hasClass = function( elem, c ) {
			return classReg( c ).test( elem.className );
		};
		addClass = function( elem, c ) {
			if ( !hasClass( elem, c ) ) {
				elem.className = elem.className + ' ' + c;
			}
		};
		removeClass = function( elem, c ) {
			elem.className = elem.className.replace( classReg( c ), ' ' );
		};
	}

	function toggleClass( elem, c ) {
		var fn = hasClass( elem, c ) ? removeClass : addClass;
		fn( elem, c );
	}

	var classie = {
		// full names
		hasClass: hasClass,
		addClass: addClass,
		removeClass: removeClass,
		toggleClass: toggleClass,
		// short names
		has: hasClass,
		add: addClass,
		remove: removeClass,
		toggle: toggleClass
	};

// transport
	if ( typeof define === 'function' && define.amd ) {
		// AMD
		define( classie );
	} else if ( typeof exports === 'object' ) {
		// CommonJS
		module.exports = classie;
	} else {
		// browser global
		window.classie = classie;
	}

})( window );
(function() {
	// detect if IE : from http://stackoverflow.com/a/16657946
	var ie = (function(){
		var undef,rv = -1; // Return value assumes failure.
		var ua = window.navigator.userAgent;
		var msie = ua.indexOf('MSIE ');
		var trident = ua.indexOf('Trident/');

		if (msie > 0) {
			// IE 10 or older => return version number
			rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
		} else if (trident > 0) {
			// IE 11 (or newer) => return version number
			var rvNum = ua.indexOf('rv:');
			rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
		}

		return ((rv > -1) ? rv : undef);
	}());
	//第二个导航点击
	if(location.hash.substr(0,8)==='#notrans'){
		//alert('ss')
		$('html,body').scrollTop(1);
		//window.scrollTo( 2000, 0 );
	}
	// disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179
	// left: 37, up: 38, right: 39, down: 40,
	// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
	var keys = [32, 37, 38, 39, 40], wheelIter = 0;

	function preventDefault(e) {
		e = e || window.event;
		if (e.preventDefault)
			e.preventDefault();
		e.returnValue = false;
	}

	function keydown(e) {
		for (var i = keys.length; i--;) {
			if (e.keyCode === keys[i]) {
				preventDefault(e);
				return;
			}
		}
	}

	function touchmove(e) {
		preventDefault(e);
	}

	function wheel(e) {
		// for IE
		//if( ie ) {
		//preventDefault(e);
		//}
	}

	function disable_scroll() {
		window.onmousewheel = document.onmousewheel = wheel;
		document.onkeydown = keydown;
		document.body.ontouchmove = touchmove;
	}

	function enable_scroll() {
		window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;
	}

	var docElem = window.document.documentElement,
		scrollVal,
		isRevealed,
		noscroll,
		isAnimating,
		container = document.getElementById( 'container' )
	//,trigger = container.querySelector( 'button.trigger' );

	function scrollY() {
		return window.pageYOffset || docElem.scrollTop;
	}

	function scrollPage() {
		scrollVal = scrollY();

		if( noscroll && !ie ) {
			if( scrollVal < 0 ) return false;
			// keep it that way
			window.scrollTo( 0, 0 );
		}

		if( classie.has( container, 'notrans' ) ) {
			classie.remove( container, 'notrans' );
			return false;
		}

		if( isAnimating ) {
			return false;
		}

		if( scrollVal <= 0 && isRevealed ) {
			toggle(0);
		}
		else if( scrollVal > 0 && !isRevealed ){
			toggle(1);
		}
	}

	function toggle( reveal ) {
		isAnimating = true;

		if( reveal ) {
			classie.add( container, 'modify' );
		}
		else {
			noscroll = true;
			disable_scroll();
			classie.remove( container, 'modify' );
		}

		// simulating the end of the transition:
		setTimeout( function() {
			isRevealed = !isRevealed;
			isAnimating = false;
			if( reveal ) {
				noscroll = false;
				enable_scroll();
			}
		}, 1200 );
	}

	// refreshing the page...
	var pageScroll = scrollY();
	noscroll = pageScroll === 0;

	disable_scroll();

	if( pageScroll ) {
		isRevealed = true;
		classie.add( container, 'notrans' );
		classie.add( container, 'modify' );
	}

	window.addEventListener( 'scroll', scrollPage );
	//第一个导航点击
	if(location.hash==='#100'){
		//alert('ss')
		//$('html,body').scrollTop(clintH+1);
		toggle( 'reveal');
		//window.scrollTo( 2000, 0 );
		location.hash='';
		//setTimeout(function(){location.hash=''},2500)
	}
	//trigger.addEventListener( 'click', function() { toggle( 'reveal' ); } );
})();/**
 * Created by dingwei on 14-12-31.
 */
