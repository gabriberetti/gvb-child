<?php
/**
 * Title: EN Printing Occasions
 * Slug: gvb/en-bedrucken-anlass
 * Categories: gvb
 *
 * Mobile line-break classes (gvb-br-mobile, gvb-br-mobile-m,
 * gvb-br-mobile-s) were tuned for German text widths and dropped
 * here — EN copy is shorter and reflows cleanly without manual breaks.
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-bedrucken-anlass is-at-start" data-carousel>
	<h2 class="gvb-bedrucken-anlass__heading gvb-fade-up">Good vibes for every occasion.</h2>

	<button type="button" class="gvb-carousel-nav gvb-carousel-nav--prev" aria-label="Previous card" aria-controls="gvb-anlass-track">
		<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
	</button>
	<button type="button" class="gvb-carousel-nav gvb-carousel-nav--next" aria-label="Next card" aria-controls="gvb-anlass-track">
		<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
	</button>

	<div class="gvb-overlay-cards" id="gvb-anlass-track" data-carousel-track>
		<div class="gvb-overlay-card gvb-overlay-card--dark-text gvb-fade-up">
			<div class="gvb-overlay-card__media">
				<img class="gvb-overlay-card__img" src="<?php echo esc_url( $img . '/anla1.png' ); ?>" alt="" />
			</div>
			<div class="gvb-overlay-card__content">
				<h3 class="gvb-overlay-card__title">Employer<br>Branding &amp;<br>Onboarding</h3>
				<p class="gvb-overlay-card__desc">Make your first impression count. Good Vibe Bottles are a thoughtful way to welcome new team members and bring your employer brand to life from day one.</p>
			</div>
		</div>

		<div class="gvb-overlay-card gvb-fade-up">
			<div class="gvb-overlay-card__media">
				<img class="gvb-overlay-card__img" src="<?php echo esc_url( $img . '/anla2.png' ); ?>" alt="" />
			</div>
			<div class="gvb-overlay-card__content">
				<h3 class="gvb-overlay-card__title">Events &amp;<br>Brand<br>Presence</h3>
				<p class="gvb-overlay-card__desc">Good Vibe Bottles are a sustainable give-away for events. They get used and keep your brand visible &ndash; a statement for conscious consumption.</p>
			</div>
		</div>

		<div class="gvb-overlay-card gvb-overlay-card--dark-text gvb-fade-up">
			<div class="gvb-overlay-card__media">
				<img class="gvb-overlay-card__img" src="<?php echo esc_url( $img . '/anla3.png' ); ?>" alt="" />
			</div>
			<div class="gvb-overlay-card__content">
				<h3 class="gvb-overlay-card__title">Merchandise</h3>
				<p class="gvb-overlay-card__desc">Good Vibe Bottles are a natural fit for your product range &ndash; practical, high-quality and aligned with your brand. Adding a touch of good vibes wherever it&rsquo;s used.</p>
			</div>
		</div>
	</div>
</section>
<!-- /wp:html -->
