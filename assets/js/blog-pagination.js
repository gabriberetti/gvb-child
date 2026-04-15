( function () {
	function initPagination() {
		var grid = document.querySelector( '.gvb-blog-grid' );
		if ( ! grid ) return;

		grid.querySelectorAll( '.wp-block-query-pagination a' ).forEach( function ( link ) {
			link.addEventListener( 'click', function ( e ) {
				e.preventDefault();
				var url = link.href;

				grid.style.opacity = '0.4';
				grid.style.transition = 'opacity 0.2s ease';

				fetch( url )
					.then( function ( res ) { return res.text(); } )
					.then( function ( html ) {
						var parser = new DOMParser();
						var doc = parser.parseFromString( html, 'text/html' );
						var newGrid = doc.querySelector( '.gvb-blog-grid' );
						if ( newGrid ) {
							grid.innerHTML = newGrid.innerHTML;
							grid.style.opacity = '1';
							history.pushState( null, '', url );
							initPagination();
						}
					} )
					.catch( function () {
						window.location = url;
					} );
			} );
		} );
	}

	document.addEventListener( 'DOMContentLoaded', initPagination );
} )();
