<?php
/**
 * Title: Tritan Product Showcase
 * Slug: gvb/tritan-product
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-bottle-showcase gvb-tritan-showcase">

	<ul class="gvb-bottle-showcase__list">

		<!-- Kavodrink Premium -->
		<li class="gvb-bottle-card gvb-fade-up gvb-bottle-card--kavo-premium" data-bottle-card>
			<div class="gvb-bottle-card__image">
				<div class="gvb-bottle-card__track" data-bottle-track>
					<div class="gvb-bottle-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-premium-transparent.png' ); ?>" alt="Kavodrink Premium – transparent" />
					</div>
					<div class="gvb-bottle-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-premium-blau.png' ); ?>" alt="Kavodrink Premium – blau" />
					</div>
					<div class="gvb-bottle-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-premium-schwarz.png' ); ?>" alt="Kavodrink Premium – schwarz" />
					</div>
					<div class="gvb-bottle-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-premium-coolgrau.png' ); ?>" alt="Kavodrink Premium – cool grau" />
					</div>
				</div>
			</div>
			<div class="gvb-bottle-card__content">
				<h2 class="gvb-bottle-card__title">Kavodrink Premium</h2>
				<div class="gvb-bottle-card__body">
					<p>Die Kavodrink Premium kombiniert modernes Design mit hochwertigem Tritan. Sie ist besonders leicht, robust und eignet sich perfekt für Unternehmen, Events oder Mitarbeiter. Auf Wunsch personalisierbar mit deinem Logo oder Design.</p>
					<p><strong>Alle Vorteile auf einen Blick:</strong></p>
					<ul>
						<li>100 % hochwertiger Tritan</li>
						<li>BPA-frei und schadstofffrei</li>
						<li>Besonders leicht und stoßfest</li>
						<li>Geruchs- und geschmacksneutral</li>
						<li>100 % auslaufsicher und geeignet für kohlensäurehaltige Getränke</li>
						<li>In mehreren stylishen Farben erhältlich – ganz nach deinem Vibe</li>
					</ul>
				</div>
				<div class="gvb-bottle-card__colors" role="tablist" aria-label="Farbe wählen">
					<button class="gvb-bottle-card__color-btn is-active" data-bottle-index="0" role="tab" aria-selected="true" aria-label="Farbe Transparent">
						<img src="<?php echo esc_url( $img . '/tritan-color-1.svg' ); ?>" alt="" />
					</button>
					<button class="gvb-bottle-card__color-btn" data-bottle-index="1" role="tab" aria-selected="false" aria-label="Farbe Blau">
						<img src="<?php echo esc_url( $img . '/tritan-color-2.svg' ); ?>" alt="" />
					</button>
					<button class="gvb-bottle-card__color-btn" data-bottle-index="2" role="tab" aria-selected="false" aria-label="Farbe Schwarz">
						<img src="<?php echo esc_url( $img . '/tritan-color-3.svg' ); ?>" alt="" />
					</button>
					<button class="gvb-bottle-card__color-btn" data-bottle-index="3" role="tab" aria-selected="false" aria-label="Farbe Cool Grau">
						<img src="<?php echo esc_url( $img . '/tritan-color-4.svg' ); ?>" alt="" />
					</button>
				</div>
				<div class="gvb-bottle-card__meta">
					<p>Größe: 800 ml</p>
					<p>inklusive Premiumverschluss, Sportverschluss mit Aufpreis</p>
				</div>
			</div>
		</li>

		<!-- Kavodrink Classic -->
		<li class="gvb-bottle-card gvb-fade-up gvb-bottle-card--kavo-classic">
			<div class="gvb-bottle-card__image">
				<img src="<?php echo esc_url( $img . '/tritan-classic.jpg' ); ?>" alt="Kavodrink Classic" />
			</div>
			<div class="gvb-bottle-card__content">
				<h2 class="gvb-bottle-card__title">Kavodrink Classic</h2>
				<div class="gvb-bottle-card__body">
					<p>Die Kavodrink Classic ist die robuste Tritanflasche für Alltag, Büro und Sport. Durch die ergonomische Griffmulde liegt sie besonders gut in der Hand und begleitet dich zuverlässig unterwegs. Auf Wunsch personalisierbar mit deinem Logo oder Design.</p>
					<p><strong>Alle Vorteile auf einen Blick:</strong></p>
					<ul>
						<li>100 % hochwertiger Tritan</li>
						<li>BPA-frei und lebensmittelecht</li>
						<li>Leicht und bruchsicher</li>
						<li>Geschmacks- und geruchsneutral</li>
						<li>Geeignet für kohlensäurehaltige Getränke</li>
						<li>Spülmaschinenfest</li>
					</ul>
				</div>
				<div class="gvb-bottle-card__colors">
					<span class="gvb-bottle-card__dot" style="background:#D9D9D9" aria-hidden="true"></span>
				</div>
				<div class="gvb-bottle-card__meta">
					<p>Größen: 500 ml, 750 ml, 1.000 ml</p>
					<p>Standardverschluss (blau), Sportverschluss, Flip-Top</p>
				</div>
			</div>
		</li>

		<!-- Kavodrink Eco -->
		<li class="gvb-bottle-card gvb-fade-up gvb-bottle-card--kavo-eco">
			<div class="gvb-bottle-card__image">
				<img src="<?php echo esc_url( $img . '/tritan-eco.jpg' ); ?>" alt="Kavodrink Eco" />
			</div>
			<div class="gvb-bottle-card__content">
				<h2 class="gvb-bottle-card__title">Kavodrink Eco</h2>
				<div class="gvb-bottle-card__body">
					<p>Die Kavodrink Eco ist unsere robuste Trinkflasche aus Polypropylen (PP). Durch ihr geringes Gewicht und ihre Langlebigkeit hat sich das Material seit Jahrzehnten im medizinischen Bereich und Bildungsbereich bewährt. Die Flaschen überzeugen durch hohe Sicherheit und einfache Handhabung. Auf Wunsch personalisierbar mit deinem Logo oder Design.</p>
					<p><strong>Alle Vorteile auf einen Blick:</strong></p>
					<ul>
						<li>100 % Polypropylen (PP)</li>
						<li>BPA-frei und ohne Weichmacher</li>
						<li>Unzerbrechlich und langlebig</li>
						<li>Leicht und robust</li>
						<li>Spülmaschinenfest</li>
					</ul>
				</div>
				<div class="gvb-bottle-card__colors">
					<span class="gvb-bottle-card__dot" style="background:#5C82D6" aria-hidden="true"></span>
				</div>
				<div class="gvb-bottle-card__meta">
					<p>Größen: 500 ml, 750 ml, 1.000 ml</p>
					<p>Standardverschluss (blau), Flip-Top</p>
				</div>
			</div>
		</li>

	</ul>

</section>
<!-- /wp:html -->
