<?php
/**
 * Title: Tritan Verschlüsse
 * Slug: gvb/tritan-verschluesse
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-borosilikat-verschluesse gvb-tritan-verschluesse">

	<h3 class="gvb-borosilikat-verschluesse__heading">Unsere Verschlüsse.</h3>

	<div class="gvb-borosilikat-verschluesse__cards">

		<!-- Classic (single color, no slider) -->
		<div class="gvb-verschluss-card">
			<div class="gvb-verschluss-card__image">
				<img src="<?php echo esc_url( $img . '/tritan-verschluss-classic.jpg' ); ?>" alt="Classic Verschluss" />
			</div>
			<div class="gvb-verschluss-card__header">
				<h5 class="gvb-verschluss-card__title">Classic</h5>
				<div class="gvb-verschluss-colors">
					<span class="gvb-bottle-card__dot is-active" style="background:#D9D9D9" aria-hidden="true"></span>
				</div>
			</div>
			<p class="gvb-verschluss-card__desc">Unser verlässlicher Standardverschluss.</p>
		</div>

		<!-- Premium (4 colors) -->
		<div class="gvb-verschluss-card" data-bottle-card>
			<div class="gvb-verschluss-card__image">
				<div class="gvb-verschluss-card__track" data-bottle-track>
					<div class="gvb-verschluss-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-verschluss-premium-grau.png' ); ?>" alt="Premium Verschluss – grau" />
					</div>
					<div class="gvb-verschluss-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-verschluss-premium-blau.png' ); ?>" alt="Premium Verschluss – blau" />
					</div>
					<div class="gvb-verschluss-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-verschluss-premium-braun.png' ); ?>" alt="Premium Verschluss – braun" />
					</div>
					<div class="gvb-verschluss-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-verschluss-premium-creme.png' ); ?>" alt="Premium Verschluss – creme" />
					</div>
				</div>
			</div>
			<div class="gvb-verschluss-card__header">
				<h5 class="gvb-verschluss-card__title">Premium</h5>
				<div class="gvb-verschluss-colors" role="tablist" aria-label="Farbe wählen">
					<button class="gvb-bottle-card__color-btn is-active" data-bottle-index="0" role="tab" aria-selected="true" aria-label="Farbe Grau">
						<img src="<?php echo esc_url( $img . '/tritan-color-4.svg' ); ?>" alt="" />
					</button>
					<button class="gvb-bottle-card__color-btn" data-bottle-index="1" role="tab" aria-selected="false" aria-label="Farbe Blau">
						<img src="<?php echo esc_url( $img . '/tritan-color-2.svg' ); ?>" alt="" />
					</button>
					<button class="gvb-bottle-card__color-btn" data-bottle-index="2" role="tab" aria-selected="false" aria-label="Farbe Braun">
						<img src="<?php echo esc_url( $img . '/tritan-color-6.svg' ); ?>" alt="" />
					</button>
					<button class="gvb-bottle-card__color-btn" data-bottle-index="3" role="tab" aria-selected="false" aria-label="Farbe Creme">
						<img src="<?php echo esc_url( $img . '/tritan-color-7.svg' ); ?>" alt="" />
					</button>
				</div>
			</div>
			<p class="gvb-verschluss-card__desc">Mit fest integriertem Dichtungsring garantiert maximale Sicherheit.</p>
		</div>

		<!-- Flip-Top (single transparent only) -->
		<div class="gvb-verschluss-card">
			<div class="gvb-verschluss-card__image">
				<img src="<?php echo esc_url( $img . '/tritan-verschluss-fliptop.jpg' ); ?>" alt="Flip-Top Verschluss" />
			</div>
			<div class="gvb-verschluss-card__header">
				<h5 class="gvb-verschluss-card__title">Flip-Top</h5>
				<div class="gvb-verschluss-colors">
					<span class="gvb-bottle-card__dot is-active" style="background:#FFFFFF" aria-hidden="true"></span>
				</div>
			</div>
			<p class="gvb-verschluss-card__desc">Optimal beim Sport, für Kinder und Patienten.</p>
		</div>

		<!-- Sport (2 colors) -->
		<div class="gvb-verschluss-card" data-bottle-card>
			<div class="gvb-verschluss-card__image">
				<div class="gvb-verschluss-card__track" data-bottle-track>
					<div class="gvb-verschluss-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-verschluss-sport-schwarz.png' ); ?>" alt="Sport Verschluss – schwarz" />
					</div>
					<div class="gvb-verschluss-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-verschluss-sport-grau.png' ); ?>" alt="Sport Verschluss – grau" />
					</div>
				</div>
			</div>
			<div class="gvb-verschluss-card__header">
				<h5 class="gvb-verschluss-card__title">Sport</h5>
				<div class="gvb-verschluss-colors" role="tablist" aria-label="Farbe wählen">
					<button class="gvb-bottle-card__color-btn is-active" data-bottle-index="0" role="tab" aria-selected="true" aria-label="Farbe Schwarz">
						<img src="<?php echo esc_url( $img . '/tritan-color-3.svg' ); ?>" alt="" />
					</button>
					<button class="gvb-bottle-card__color-btn" data-bottle-index="1" role="tab" aria-selected="false" aria-label="Farbe Grau">
						<img src="<?php echo esc_url( $img . '/tritan-color-4.svg' ); ?>" alt="" />
					</button>
				</div>
			</div>
			<p class="gvb-verschluss-card__desc">Ergonomisch, griffig und einhändig bedienbar.</p>
		</div>

	</div>

</section>
<!-- /wp:html -->
