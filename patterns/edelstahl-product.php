<?php
/**
 * Title: Edelstahl Product Showcase
 * Slug: gvb/edelstahl-product
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<div class="gvb-edelstahl-product">

	<div class="gvb-edelstahl-product__image-col">
		<img
			id="gvb-edelstahl-main-img"
			src="<?php echo esc_url( $img . '/edelstahl-product.jpg' ); ?>"
			alt="Edelstahl Trinkflasche"
		/>
	</div>

	<div class="gvb-edelstahl-product__content">

		<h2 class="gvb-edelstahl-product__title">Edelstahl</h2>

		<div class="gvb-edelstahl-product__desc">
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

		<div class="gvb-edelstahl-product__colors">
			<button
				class="gvb-edelstahl-product__color-btn is-active"
				data-img="<?php echo esc_url( $img . '/edelstahl-product.jpg' ); ?>"
				aria-label="Farbe 1"
			>
				<img src="<?php echo esc_url( $img . '/edelstahl-color-1.svg' ); ?>" alt="" />
			</button>
			<button
				class="gvb-edelstahl-product__color-btn"
				data-img="<?php echo esc_url( $img . '/edelstahl-product.jpg' ); ?>"
				aria-label="Farbe 2"
			>
				<img src="<?php echo esc_url( $img . '/edelstahl-color-2.svg' ); ?>" alt="" />
			</button>
			<button
				class="gvb-edelstahl-product__color-btn"
				data-img="<?php echo esc_url( $img . '/edelstahl-product.jpg' ); ?>"
				aria-label="Farbe 3"
			>
				<img src="<?php echo esc_url( $img . '/edelstahl-color-3.svg' ); ?>" alt="" />
			</button>
		</div>

		<div class="gvb-edelstahl-product__meta">
			<p>Größe: 750 ml</p>
			<p>inklusive Edelstahlverschluss</p>
		</div>

	</div>

</div>

<script>
(function() {
	var mainImg = document.getElementById('gvb-edelstahl-main-img');
	var btns = document.querySelectorAll('.gvb-edelstahl-product__color-btn');
	btns.forEach(function(btn) {
		btn.addEventListener('click', function() {
			btns.forEach(function(b) { b.classList.remove('is-active'); });
			btn.classList.add('is-active');
			mainImg.src = btn.dataset.img;
		});
	});
})();
</script>
<!-- /wp:html -->
