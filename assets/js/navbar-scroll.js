/**
 * GVB Smart Navbar — hide on scroll down, show on scroll up.
 * Pattern: Headroom.js-style. rAF-throttled, passive listener,
 * respects prefers-reduced-motion, reveals on focus-within,
 * stays visible while mobile menu is open.
 *
 * Only active on laptop+ (≥785px). At tablet/mobile widths the navbar
 * is static (position: relative) — see Section 3 (HEADER) in style.css.
 */
(function () {
  'use strict';

  var header = document.querySelector('.gvb-header');
  if (!header) return;

  // Smart-nav only applies above the tablet/mobile breakpoint.
  // Below, the navbar is static and CSS overrides any toggled classes anyway —
  // no point burning rAF cycles on scroll at those widths.
  var desktopMQ = window.matchMedia('(min-width: 785px)');

  var TOP_THRESHOLD = 10;          // px from top → treat as "at top"
  var DELTA_THRESHOLD = 6;         // min scroll delta before flipping state
  var REVEAL_MIN_SCROLL = 80;      // don't hide if scrollY is below this

  var lastY = window.pageYOffset || 0;
  var accumulated = 0;
  var ticking = false;

  function clearState() {
    header.classList.remove('gvb-header--top');
    header.classList.remove('gvb-header--pinned');
    header.classList.remove('gvb-header--unpinned');
  }

  function setState() {
    // Bail on tablet/mobile — navbar is static there.
    if (!desktopMQ.matches) {
      clearState();
      ticking = false;
      return;
    }

    var y = window.pageYOffset || 0;
    var delta = y - lastY;

    // At top — always visible, no shadow
    if (y <= TOP_THRESHOLD) {
      header.classList.remove('gvb-header--unpinned');
      header.classList.remove('gvb-header--pinned');
      header.classList.add('gvb-header--top');
      lastY = y;
      accumulated = 0;
      ticking = false;
      return;
    }

    header.classList.remove('gvb-header--top');

    // Never hide while mobile menu is open
    var menuOpen = document.querySelector('.wp-block-navigation__responsive-container.is-menu-open');
    if (menuOpen) {
      header.classList.remove('gvb-header--unpinned');
      header.classList.add('gvb-header--pinned');
      lastY = y;
      ticking = false;
      return;
    }

    // Accumulate delta to avoid trackpad jitter flipping state
    if ((delta > 0 && accumulated < 0) || (delta < 0 && accumulated > 0)) {
      accumulated = 0;
    }
    accumulated += delta;

    if (accumulated > DELTA_THRESHOLD && y > REVEAL_MIN_SCROLL) {
      // Scrolling down
      header.classList.add('gvb-header--unpinned');
      header.classList.remove('gvb-header--pinned');
      accumulated = 0;
    } else if (accumulated < -DELTA_THRESHOLD) {
      // Scrolling up
      header.classList.remove('gvb-header--unpinned');
      header.classList.add('gvb-header--pinned');
      accumulated = 0;
    }

    lastY = y;
    ticking = false;
  }

  function onScroll() {
    if (!ticking) {
      window.requestAnimationFrame(setState);
      ticking = true;
    }
  }

  // Keyboard users: tabbing into the nav forces visible (desktop only)
  header.addEventListener('focusin', function () {
    if (!desktopMQ.matches) return;
    header.classList.remove('gvb-header--unpinned');
    header.classList.add('gvb-header--pinned');
  });

  window.addEventListener('scroll', onScroll, { passive: true });

  // Re-evaluate on breakpoint crossing (covers rotation / resize)
  if (desktopMQ.addEventListener) {
    desktopMQ.addEventListener('change', setState);
  } else if (desktopMQ.addListener) {
    // Safari < 14
    desktopMQ.addListener(setState);
  }

  // Initial state
  setState();
})();
