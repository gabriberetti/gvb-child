<?php
/**
 * Title: Edelstahl Product Showcase
 * Slug: gvb/edelstahl-product
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-bottle-showcase">

	<div class="gvb-bottle-card gvb-fade-up">

		<div class="gvb-bottle-card__image">
			<img
				id="gvb-edelstahl-main-img"
				src="<?php echo esc_url( $img . '/edelstahl-product.jpg' ); ?>"
				alt="Edelstahl Trinkflasche"
			/>
		</div>

		<div class="gvb-bottle-card__content">

			<h2 class="gvb-bottle-card__title">Edelstahl</h2>

			<div class="gvb-bottle-card__body">
				<p>Unsere robuste Premium-Edelstahlflasche ist mit ihrer starken Isolierung perfekt für die kleine Erfrischung oder die Kaffeepause zwischendurch. Nachhaltige Materialqualität trifft auf durchdachte Funktionalität – gemacht für den täglichen Einsatz in Freizeit oder Büro. Auf Wunsch personalisierbar mit deinem Logo oder Design.</p>
				<p><strong>Alle Vorteile auf einen Blick</strong></p>
				<ul>
					<li>100 % hochwertiger Edelstahl (SS304/SS201)</li>
					<li>BPA-frei und lebensmittelecht</li>
					<li>Geschmacks- und geruchsneutral</li>
					<li>Doppelwandige Isolierung</li>
					<li>Robust, langlebig und leicht</li>
					<li>auch Pantone-Farben möglich (abhängig von der Bestellmenge)</li>
				</ul>
			</div>

			<div class="gvb-bottle-card__colors">
				<button
					class="gvb-bottle-card__color-btn is-active"
					data-img="<?php echo esc_url( $img . '/edelstahl-product.jpg' ); ?>"
					data-target="gvb-edelstahl-main-img"
					aria-label="Farbe 1"
				>
					<img src="<?php echo esc_url( $img . '/edelstahl-color-1.svg' ); ?>" alt="" />
				</button>
				<button
					class="gvb-bottle-card__color-btn"
					data-img="<?php echo esc_url( $img . '/edelstahl-product.jpg' ); ?>"
					data-target="gvb-edelstahl-main-img"
					aria-label="Farbe 2"
				>
					<img src="<?php echo esc_url( $img . '/edelstahl-color-2.svg' ); ?>" alt="" />
				</button>
				<button
					class="gvb-bottle-card__color-btn"
					data-img="<?php echo esc_url( $img . '/edelstahl-product.jpg' ); ?>"
					data-target="gvb-edelstahl-main-img"
					aria-label="Farbe 3"
				>
					<img src="<?php echo esc_url( $img . '/edelstahl-color-3.svg' ); ?>" alt="" />
				</button>
			</div>

			<div class="gvb-bottle-card__meta">
				<p>Größe: 750 ml</p>
				<p>inklusive Edelstahlverschluss</p>
			</div>

		</div>

	</div>

</section>

<script>
(function() {
	var btns = document.querySelectorAll('.gvb-bottle-card__color-btn');
	btns.forEach(function(btn) {
		btn.addEventListener('click', function() {
			var targetId = btn.dataset.target;
			var group = btn.closest('.gvb-bottle-card__colors');
			group.querySelectorAll('.gvb-bottle-card__color-btn').forEach(function(b) {
				b.classList.remove('is-active');
			});
			btn.classList.add('is-active');
			var mainImg = document.getElementById(targetId);
			if (mainImg) mainImg.src = btn.dataset.img;
		});
	});
})();
</script>
<!-- /wp:html -->
