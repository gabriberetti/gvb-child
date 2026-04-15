/**
 * GVB Scroll Animations
 * Fades elements up into view as they enter the viewport.
 * Auto-staggers sibling .gvb-fade-up elements within the same parent.
 */
document.addEventListener( 'DOMContentLoaded', function () {

	const elements = document.querySelectorAll( '.gvb-fade-up' );
	if ( ! elements.length ) return;

	// Auto-stagger: siblings sharing the same parent get incremental delays
	const seen = new WeakSet();
	elements.forEach( function ( el ) {
		const parent = el.parentElement;
		if ( seen.has( parent ) ) return;
		seen.add( parent );

		const siblings = Array.from( parent.querySelectorAll( ':scope > .gvb-fade-up' ) );
		siblings.forEach( function ( sibling, index ) {
			if ( index > 0 ) {
				sibling.style.transitionDelay = ( index * 0.1 ).toFixed( 1 ) + 's';
			}
		} );
	} );

	// Observe each element — fires once, then stops watching
	const observer = new IntersectionObserver( function ( entries ) {
		entries.forEach( function ( entry ) {
			if ( entry.isIntersecting ) {
				entry.target.classList.add( 'gvb-in-view' );
				observer.unobserve( entry.target );
			}
		} );
	}, {
		threshold: 0,
		rootMargin: '0px 0px -60px 0px'
	} );

	elements.forEach( function ( el ) {
		observer.observe( el );
	} );

} );
