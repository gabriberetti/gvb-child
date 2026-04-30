<?php
/**
 * Title: EN Stainless Steel Features
 * Slug: gvb/en-edelstahl-features
 * Categories: gvb
 *
 * Section heading "Stainless steel done right." drafted inline — the
 * agency translation doc has no direct equivalent for the German
 * "Bei Edelstahl stimmt der Vibe." Flagged for review.
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-edelstahl-features">

	<h3 class="gvb-edelstahl-features__heading gvb-fade-up">Stainless steel done right.</h3>

	<ul class="gvb-edelstahl-features__cards">

		<li class="gvb-edelstahl-feature-card gvb-fade-up">
			<div class="gvb-edelstahl-feature-card__image">
				<img src="<?php echo esc_url( $img . '/edelstahl-feature-1.jpg' ); ?>" alt="Premium stainless steel" />
			</div>
			<div class="gvb-edelstahl-feature-card__text">
				<h5 class="gvb-edelstahl-feature-card__title">Premium stainless steel. Built for everyday use.</h5>
				<p class="gvb-edelstahl-feature-card__desc">Made from high-quality, food-safe stainless steel, our bottles are durable, safe and completely neutral in taste. Designed to last &ndash; even with daily use.</p>
			</div>
		</li>

		<li class="gvb-edelstahl-feature-card gvb-fade-up">
			<div class="gvb-edelstahl-feature-card__image">
				<img src="<?php echo esc_url( $img . '/edelstahl-feature-2.jpg' ); ?>" alt="Double-walled insulation" />
			</div>
			<div class="gvb-edelstahl-feature-card__text">
				<h5 class="gvb-edelstahl-feature-card__title">Keeps your drink just right.</h5>
				<p class="gvb-edelstahl-feature-card__desc">Tea, coffee or cold drinks &mdash; thanks to double-walled insulation, your drink stays at the perfect temperature for hours, hot or cold, exactly when you need it.</p>
			</div>
		</li>

		<li class="gvb-edelstahl-feature-card gvb-fade-up">
			<div class="gvb-edelstahl-feature-card__image">
				<img src="<?php echo esc_url( $img . '/edelstahl-feature-3.jpg' ); ?>" alt="A more sustainable choice" />
			</div>
			<div class="gvb-edelstahl-feature-card__text">
				<h5 class="gvb-edelstahl-feature-card__title">A more sustainable choice.</h5>
				<p class="gvb-edelstahl-feature-card__desc">Reusable, durable and built to last &ndash; our stainless steel bottles help reduce single-use plastic without compromising on quality or design.</p>
			</div>
		</li>

		<li class="gvb-edelstahl-feature-card gvb-fade-up">
			<div class="gvb-edelstahl-feature-card__image">
				<img src="<?php echo esc_url( $img . '/edelstahl-feature-4.jpg' ); ?>" alt="Your bottle. Your vibe." />
			</div>
			<div class="gvb-edelstahl-feature-card__text">
				<h5 class="gvb-edelstahl-feature-card__title">Your bottle.<br>Your vibe.</h5>
				<p class="gvb-edelstahl-feature-card__desc">Make it yours. We personalise your bottle with high-quality printing or laser engraving &ndash; so your design stands out.</p>
			</div>
		</li>

	</ul>

</section>
<!-- /wp:html -->
