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

	<div class="gvb-bottle-card gvb-fade-up" data-bottle-card>

		<div class="gvb-bottle-card__image">
			<div class="gvb-bottle-card__track" data-bottle-track>
				<div class="gvb-bottle-card__slide">
					<img src="<?php echo esc_url( $img . '/edelstahl-product.jpg' ); ?>" alt="Edelstahl Trinkflasche – blau" />
				</div>
				<div class="gvb-bottle-card__slide">
					<img src="<?php echo esc_url( $img . '/edelstahl-silver.png' ); ?>" alt="Edelstahl Trinkflasche – silber" />
				</div>
				<div class="gvb-bottle-card__slide">
					<img src="<?php echo esc_url( $img . '/edelstahl-white.png' ); ?>" alt="Edelstahl Trinkflasche – weiß" />
				</div>
			</div>
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
					<li>Weitere Standard- oder Wunsch Pantone-Farbe auf Anfrage möglich</li>
				</ul>
			</div>

			<div class="gvb-bottle-card__colors" role="tablist" aria-label="Farbe wählen">
				<button class="gvb-bottle-card__color-btn is-active" data-bottle-index="0" role="tab" aria-selected="true" aria-label="Farbe Blau">
					<img src="<?php echo esc_url( $img . '/edelstahl-color-1.svg' ); ?>" alt="" />
				</button>
				<button class="gvb-bottle-card__color-btn" data-bottle-index="1" role="tab" aria-selected="false" aria-label="Farbe Silber">
					<img src="<?php echo esc_url( $img . '/edelstahl-color-2.svg' ); ?>" alt="" />
				</button>
				<button class="gvb-bottle-card__color-btn" data-bottle-index="2" role="tab" aria-selected="false" aria-label="Farbe Weiß">
					<img src="<?php echo esc_url( $img . '/edelstahl-color-3.svg' ); ?>" alt="" />
				</button>
			</div>

			<div class="gvb-bottle-card__meta">
				<p>Größe: 750 ml</p>
				<p>Inkl. Edelstahlverschluss</p>
			</div>

		</div>

	</div>

</section>
<!-- /wp:html -->
