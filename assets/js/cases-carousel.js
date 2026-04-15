/**
 * Cases Carousel — tab switcher + mobile arrow nav + touch swipe
 */
(function () {
  document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.querySelector('.gvb-cases');
    if (!wrapper) return;

    const tabs    = wrapper.querySelectorAll('.gvb-cases__tab');
    const panels  = wrapper.querySelectorAll('.gvb-cases__panel');
    const prevBtn = wrapper.querySelector('.gvb-cases__nav--prev');
    const nextBtn = wrapper.querySelector('.gvb-cases__nav--next');
    const bgImg   = wrapper.querySelector('.gvb-cases__bg');
    const total   = panels.length;
    let current   = 0;
    let swapping  = false;

    function swapPhoto(newSrc) {
      if (!bgImg || !newSrc || swapping) return;
      swapping = true;
      bgImg.style.opacity = '0';
      setTimeout(function () {
        bgImg.src = newSrc;
        bgImg.style.opacity = '1';
        swapping = false;
      }, 150);
    }

    function goTo(index) {
      if (index === current || index < 0 || index >= total) return;

      tabs.forEach(function (t)  { t.classList.remove('is-active'); });
      panels.forEach(function (p) { p.classList.remove('is-active'); });

      if (tabs[index])   tabs[index].classList.add('is-active');
      if (panels[index]) panels[index].classList.add('is-active');

      swapPhoto(panels[index].getAttribute('data-bg'));

      current = index;

      if (prevBtn) prevBtn.disabled = current === 0;
      if (nextBtn) nextBtn.disabled = current === total - 1;
    }

    // Tab clicks (desktop)
    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        goTo(parseInt(this.getAttribute('data-tab'), 10));
      });
    });

    // Arrow buttons (mobile)
    if (prevBtn) prevBtn.addEventListener('click', function () { goTo(current - 1); });
    if (nextBtn) nextBtn.addEventListener('click', function () { goTo(current + 1); });

    // Touch swipe (mobile)
    var touchStartX = 0;
    wrapper.addEventListener('touchstart', function (e) {
      touchStartX = e.changedTouches[0].clientX;
    }, { passive: true });

    wrapper.addEventListener('touchend', function (e) {
      var diff = touchStartX - e.changedTouches[0].clientX;
      if (Math.abs(diff) > 50) {
        goTo(diff > 0 ? current + 1 : current - 1);
      }
    }, { passive: true });

    // Init arrow state
    if (prevBtn) prevBtn.disabled = true;
    if (nextBtn) nextBtn.disabled = total <= 1;
  });
})();
