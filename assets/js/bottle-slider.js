/**
 * Bottle / Cap color slider.
 *
 * Markup contract:
 *   <ROOT data-bottle-card>
 *     <ANY data-bottle-track>
 *       <ANY> ... </ANY>   (one slide per color)
 *     </ANY>
 *     <BUTTON data-bottle-index="N" class="...is-active?">…</BUTTON> ×N
 *   </ROOT>
 *
 * Click translates the track by -N×100% with a smooth ease.
 */
(function () {
	function init(card) {
		var track = card.querySelector('[data-bottle-track]');
		var btns  = card.querySelectorAll('[data-bottle-index]');
		if (!track || !btns.length) return;

		btns.forEach(function (btn) {
			btn.addEventListener('click', function () {
				var index = parseInt(btn.dataset.bottleIndex, 10) || 0;
				track.style.transform = 'translate3d(-' + (index * 100) + '%, 0, 0)';
				btns.forEach(function (b) {
					b.classList.remove('is-active');
					b.setAttribute('aria-selected', 'false');
				});
				btn.classList.add('is-active');
				btn.setAttribute('aria-selected', 'true');
			});
		});
	}

	function ready(fn) {
		if (document.readyState !== 'loading') fn();
		else document.addEventListener('DOMContentLoaded', fn);
	}

	ready(function () {
		document.querySelectorAll('[data-bottle-card]').forEach(init);
	});
})();
