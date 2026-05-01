/**
 * GVB Language Redirect (Option B — soft auto-redirect)
 *
 * Soft-redirects non-German-speaking visitors from DE pages to their EN
 * equivalent on first visit. Respects manual switcher choices forever
 * after via localStorage.
 *
 * Decision matrix (runs on EVERY page load):
 *
 *   1. Already on /en/* path     → no-op (skip everything)
 *   2. localStorage choice set   → no-op (user has decided once)
 *   3. URL has ?no-lang-redirect → no-op (testing/debug bypass)
 *   4. navigator.language ~ /^de/ → no-op (German speakers stay on DE)
 *   5. Otherwise                 → redirect to EN equivalent + set
 *                                  localStorage so we never ask again.
 *
 * URL mapping comes from window.GVB_LANG_MAP (injected by functions.php
 * from gvb_page_pair_map() — one source of truth across PHP and JS).
 *
 * Manual switcher click handler: any click on .gvb-lang-switcher__link
 * records the chosen language in localStorage so future visits respect
 * the user's preference (no auto-redirect ping-pong).
 *
 * Bot-safe: search engines don't execute JS by default, so this never
 * fires for crawlers — DE and EN URLs continue to be indexed
 * independently per their hreflang annotations.
 *
 * Loaded in <head> (not footer) so the redirect happens before any
 * visible content paints — avoids the FOUC of a flash of DE before
 * jumping to EN.
 */
(function () {
	'use strict';

	var STORAGE_KEY = 'gvb_lang_choice';

	/* ─── Manual switcher click handler ─────────────────────────────
	   Even users on /en/* pages should record their choice when they
	   click the switcher, so attach this BEFORE the early return. */
	document.addEventListener( 'click', function ( e ) {
		var link = e.target && e.target.closest ? e.target.closest( '.gvb-lang-switcher__link' ) : null;
		if ( ! link ) return;
		try {
			localStorage.setItem( STORAGE_KEY, link.getAttribute( 'lang' ) || 'manual' );
		} catch ( err ) { /* localStorage unavailable — silently ignore */ }
	}, true );

	/* ─── Skip cases ────────────────────────────────────────────── */

	// Already on EN section — nothing to redirect.
	if ( location.pathname.indexOf( '/en/' ) === 0 ) return;

	// User already chose a language (manually or via prior auto-redirect).
	try {
		if ( localStorage.getItem( STORAGE_KEY ) ) return;
	} catch ( err ) { /* localStorage unavailable — fall through and may redirect once */ }

	// Testing bypass: ?no-lang-redirect=1 in URL.
	if ( location.search.indexOf( 'no-lang-redirect' ) !== -1 ) return;

	/* ─── Browser language detection ────────────────────────────── */

	var lang = ( navigator.language || navigator.userLanguage || '' ).toLowerCase();

	// German speakers stay on DE (covers de, de-DE, de-AT, de-CH, etc.).
	if ( lang.indexOf( 'de' ) === 0 ) return;

	/* ─── Resolve EN equivalent path ────────────────────────────── */

	var map  = window.GVB_LANG_MAP || {};
	var path = location.pathname;

	// Normalize: strip trailing slash for map lookup, but preserve `/`.
	var lookupPath = path === '/' ? '/' : path.replace( /\/$/, '' );

	var enPath;
	if ( map[ lookupPath ] ) {
		// Static page pair found.
		enPath = map[ lookupPath ];
	} else if ( /^\/blog($|\/)/.test( path ) ) {
		// DE blog URLs (post archive or any /blog/...) → fall back to EN blog index.
		enPath = '/en/blog/';
	} else {
		// Anything else (uncommon paths) → EN home.
		enPath = '/en/';
	}

	/* ─── Persist + redirect ────────────────────────────────────── */

	try {
		localStorage.setItem( STORAGE_KEY, 'auto-en' );
	} catch ( err ) { /* ignore */ }

	// location.replace() so the DE URL doesn't pollute the user's back-stack.
	location.replace( enPath + location.search + location.hash );
})();
