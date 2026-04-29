<?php
/**
 * Title: EN Tritan Closures
 * Slug: gvb/en-tritan-verschluesse
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-borosilikat-verschluesse gvb-tritan-verschluesse">

	<h3 class="gvb-borosilikat-verschluesse__heading">Our bottle closures.</h3>

	<div class="gvb-borosilikat-verschluesse__cards">

		<!-- Standard closure (single colour, no slider) -->
		<div class="gvb-verschluss-card">
			<div class="gvb-verschluss-card__image">
				<img src="<?php echo esc_url( $img . '/tritan-verschluss-classic.jpg' ); ?>" alt="Standard closure" />
			</div>
			<div class="gvb-verschluss-card__header">
				<h5 class="gvb-verschluss-card__title">Standard</h5>
				<div class="gvb-verschluss-colors">
					<span class="gvb-bottle-card__dot is-active" style="background:#5C82D6" aria-hidden="true"></span>
				</div>
			</div>
			<p class="gvb-verschluss-card__desc">Our reliable and leak-proof classic closure.</p>
		</div>

		<!-- Premium (4 colours) -->
		<div class="gvb-verschluss-card" data-bottle-card>
			<div class="gvb-verschluss-card__image">
				<div class="gvb-verschluss-card__track" data-bottle-track>
					<div class="gvb-verschluss-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-verschluss-premium-grau.png' ); ?>" alt="Premium closure &ndash; grey" />
					</div>
					<div class="gvb-verschluss-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-verschluss-premium-blau.png' ); ?>" alt="Premium closure &ndash; blue" />
					</div>
					<div class="gvb-verschluss-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-verschluss-premium-braun.png' ); ?>" alt="Premium closure &ndash; brown" />
					</div>
					<div class="gvb-verschluss-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-verschluss-premium-creme.png' ); ?>" alt="Premium closure &ndash; cream" />
					</div>
				</div>
			</div>
			<div class="gvb-verschluss-card__header">
				<h5 class="gvb-verschluss-card__title">Premium</h5>
				<div class="gvb-verschluss-colors" role="tablist" aria-label="Choose colour">
					<button class="gvb-bottle-card__color-btn is-active" data-bottle-index="0" role="tab" aria-selected="true" aria-label="Colour grey">
						<img src="<?php echo esc_url( $img . '/tritan-color-4.svg' ); ?>" alt="" />
					</button>
					<button class="gvb-bottle-card__color-btn" data-bottle-index="1" role="tab" aria-selected="false" aria-label="Colour blue">
						<img src="<?php echo esc_url( $img . '/tritan-color-2.svg' ); ?>" alt="" />
					</button>
					<button class="gvb-bottle-card__color-btn" data-bottle-index="2" role="tab" aria-selected="false" aria-label="Colour brown">
						<img src="<?php echo esc_url( $img . '/tritan-color-6.svg' ); ?>" alt="" />
					</button>
					<button class="gvb-bottle-card__color-btn" data-bottle-index="3" role="tab" aria-selected="false" aria-label="Colour cream">
						<img src="<?php echo esc_url( $img . '/tritan-color-7.svg' ); ?>" alt="" />
					</button>
				</div>
			</div>
			<p class="gvb-verschluss-card__desc">With a permanently integrated sealing ring for maximum sealing performance.</p>
		</div>

		<!-- Flip-Top (single image — main simplified from 2-colour slider) -->
		<div class="gvb-verschluss-card">
			<div class="gvb-verschluss-card__image">
				<img src="<?php echo esc_url( $img . '/tritan-verschluss-fliptop.jpg' ); ?>" alt="Flip-Top closure" />
			</div>
			<div class="gvb-verschluss-card__header">
				<h5 class="gvb-verschluss-card__title">Flip-Top</h5>
				<div class="gvb-verschluss-colors">
					<span class="gvb-bottle-card__dot is-active" style="background:#FFFFFF" aria-hidden="true"></span>
				</div>
			</div>
			<p class="gvb-verschluss-card__desc">Ideal for sports, for children and patients.</p>
		</div>

		<!-- Sport (2 colours) -->
		<div class="gvb-verschluss-card" data-bottle-card>
			<div class="gvb-verschluss-card__image">
				<div class="gvb-verschluss-card__track" data-bottle-track>
					<div class="gvb-verschluss-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-verschluss-sport-schwarz.png' ); ?>" alt="Sport closure &ndash; black" />
					</div>
					<div class="gvb-verschluss-card__slide">
						<img src="<?php echo esc_url( $img . '/tritan-verschluss-sport-grau.png' ); ?>" alt="Sport closure &ndash; grey" />
					</div>
				</div>
			</div>
			<div class="gvb-verschluss-card__header">
				<h5 class="gvb-verschluss-card__title">Sport</h5>
				<div class="gvb-verschluss-colors" role="tablist" aria-label="Choose colour">
					<button class="gvb-bottle-card__color-btn is-active" data-bottle-index="0" role="tab" aria-selected="true" aria-label="Colour black">
						<img src="<?php echo esc_url( $img . '/tritan-color-3.svg' ); ?>" alt="" />
					</button>
					<button class="gvb-bottle-card__color-btn" data-bottle-index="1" role="tab" aria-selected="false" aria-label="Colour grey">
						<img src="<?php echo esc_url( $img . '/tritan-color-4.svg' ); ?>" alt="" />
					</button>
				</div>
			</div>
			<p class="gvb-verschluss-card__desc">Ergonomic and non-slip &ndash; easy to use with one hand.</p>
		</div>

	</div>

</section>
<!-- /wp:html -->
