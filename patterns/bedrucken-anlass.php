<?php
/**
 * Title: Bedrucken Anlass
 * Slug: gvb/bedrucken-anlass
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-bedrucken-anlass is-at-start" data-carousel>
	<h2 class="gvb-bedrucken-anlass__heading gvb-fade-up">Good Vibes für jeden Anlass.</h2>

	<button type="button" class="gvb-carousel-nav gvb-carousel-nav--prev" aria-label="Vorherige Karte" aria-controls="gvb-anlass-track">
		<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
	</button>
	<button type="button" class="gvb-carousel-nav gvb-carousel-nav--next" aria-label="Nächste Karte" aria-controls="gvb-anlass-track">
		<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
	</button>

	<div class="gvb-overlay-cards" id="gvb-anlass-track" data-carousel-track>
		<div class="gvb-overlay-card gvb-overlay-card--dark-text gvb-fade-up">
			<div class="gvb-overlay-card__media">
				<img class="gvb-overlay-card__img" src="<?php echo esc_url( $img . '/newanlass1.png' ); ?>" alt="" />
				<h3 class="gvb-overlay-card__title">Employer<br>Branding &amp;<br>Onboarding</h3>
			</div>
			<div class="gvb-overlay-card__content">
				<p class="gvb-overlay-card__desc">Good Vibe Bottles sind <br class="gvb-br-mobile">perfekt für Welcome Kits, <br class="gvb-br-mobile">zur Begrüßung neuer Kolleginnen und <br class="gvb-br-mobile">Kollegen und unterstützen<br class="gvb-br-mobile-s"> gleichzeitig <br class="gvb-br-mobile-m">Employer Branding <br class="gvb-br-mobile-s">bei potenziellen Mitarbeitenden.</p>
			</div>
		</div>

		<div class="gvb-overlay-card gvb-fade-up">
			<div class="gvb-overlay-card__media">
				<img class="gvb-overlay-card__img" src="<?php echo esc_url( $img . '/bedrucken-anlass-2.png' ); ?>" alt="" />
				<h3 class="gvb-overlay-card__title">Events &amp;<br>Marken-<br>auftritte</h3>
			</div>
			<div class="gvb-overlay-card__content">
				<p class="gvb-overlay-card__desc">Unsere Flaschen sind das <br class="gvb-br-mobile-s">nachhaltige Give Away oder <br class="gvb-br-mobile-s">Goodie auf Events oder Messen.</p>
			</div>
		</div>

		<div class="gvb-overlay-card gvb-overlay-card--dark-text gvb-fade-up">
			<div class="gvb-overlay-card__media">
				<img class="gvb-overlay-card__img" src="<?php echo esc_url( $img . '/bedrucken-anlass-3.png' ); ?>" alt="" />
				<h3 class="gvb-overlay-card__title">Merchandise</h3>
			</div>
			<div class="gvb-overlay-card__content">
				<p class="gvb-overlay-card__desc">Good Vibe Bottles sind die <br class="gvb-br-mobile">perfekte Ergänzung als Merchandise <br class="gvb-br-mobile">für deinen Shop, deine Marke und <br class="gvb-br-mobile">überall wo es Good Vibes braucht.</p>
			</div>
		</div>
	</div>
</section>
<!-- /wp:html -->
