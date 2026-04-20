( function () {
	'use strict';

	/**
	 * GVB generic horizontal carousel controller.
	 *
	 * Any element with [data-carousel] is treated as a carousel root; inside it,
	 * [data-carousel-track] is the scrollable strip and
	 * .gvb-carousel-nav--prev / --next are the chevron buttons.
	 *
	 * Root gets .is-at-start / .is-at-end classes based on scroll position;
	 * CSS uses those to show/hide chevrons. Chevron clicks scroll by one card.
	 */
	function initCarousel( root ) {
		var track = root.querySelector( '[data-carousel-track]' );
		var prev  = root.querySelector( '.gvb-carousel-nav--prev' );
		var next  = root.querySelector( '.gvb-carousel-nav--next' );

		if ( ! track || ! prev || ! next ) return;

		function updateState() {
			var max     = track.scrollWidth - track.clientWidth;
			var atStart = track.scrollLeft <= 1;
			var atEnd   = track.scrollLeft >= max - 1;

			root.classList.toggle( 'is-at-start', atStart );
			root.classList.toggle( 'is-at-end', atEnd && ! atStart );
		}

		function stepSize() {
			var card = track.firstElementChild;
			if ( ! card ) return track.clientWidth;
			var gap = parseFloat( getComputedStyle( track ).columnGap ) || 0;
			return card.getBoundingClientRect().width + gap;
		}

		prev.addEventListener( 'click', function () {
			track.scrollBy( { left: -stepSize(), behavior: 'smooth' } );
		} );

		next.addEventListener( 'click', function () {
			track.scrollBy( { left: stepSize(), behavior: 'smooth' } );
		} );

		track.addEventListener( 'scroll', updateState, { passive: true } );

		if ( 'ResizeObserver' in window ) {
			new ResizeObserver( updateState ).observe( track );
		} else {
			window.addEventListener( 'resize', updateState );
		}

		updateState();
	}

	function init() {
		document.querySelectorAll( '[data-carousel]' ).forEach( initCarousel );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();
