/**
 * Cases Carousel — tab switcher
 */
(function () {
  document.addEventListener('DOMContentLoaded', function () {
    const wrapper = document.querySelector('.gvb-cases');
    if (!wrapper) return;

    const tabs = wrapper.querySelectorAll('.gvb-cases__tab');
    const panels = wrapper.querySelectorAll('.gvb-cases__panel');

    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        const index = this.getAttribute('data-tab');

        tabs.forEach(function (t) { t.classList.remove('is-active'); });
        panels.forEach(function (p) { p.classList.remove('is-active'); });

        this.classList.add('is-active');
        var target = wrapper.querySelector('.gvb-cases__panel[data-panel="' + index + '"]');
        if (target) target.classList.add('is-active');
      });
    });
  });
})();
