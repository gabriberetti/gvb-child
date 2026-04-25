<?php
/**
 * Title: EN Product Cards
 * Slug: gvb/en-product-cards
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:group {"className":"gvb-product-cards is-at-start","style":{"spacing":{"padding":{"left":"20px","right":"20px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-product-cards is-at-start" data-carousel style="padding-left:20px;padding-right:20px">

	<!-- wp:html -->
	<button type="button" class="gvb-carousel-nav gvb-carousel-nav--prev" aria-label="Previous card" aria-controls="gvb-product-cards-track">
		<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"/></svg>
	</button>
	<button type="button" class="gvb-carousel-nav gvb-carousel-nav--next" aria-label="Next card" aria-controls="gvb-product-cards-track">
		<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"/></svg>
	</button>
	<!-- /wp:html -->

	<!-- wp:group {"className":"gvb-product-cards__track","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group gvb-product-cards__track" id="gvb-product-cards-track" data-carousel-track>

		<!-- card 1 -->
		<div class="gvb-product-card gvb-product-card--dark gvb-fade-up">
			<div class="gvb-product-card__media">
				<img class="gvb-product-card__bg" src="<?php echo esc_url( $img . '/card-besser-trinken.png' ); ?>" alt="" />
				<h2 class="gvb-product-card__title">Drink<br>better.</h2>
			</div>
			<div class="gvb-product-card__content">
				<p class="gvb-product-card__text">Make the right choice. With our bottles made from sustainable materials and real good vibes, drinking just feels better.</p>
			</div>
		</div>

		<!-- card 2 -->
		<div class="gvb-product-card gvb-product-card--orange gvb-fade-up">
			<div class="gvb-product-card__media">
				<img class="gvb-product-card__bg" src="<?php echo esc_url( $img . '/card-genau-dein-vibe.png' ); ?>" alt="" />
				<h2 class="gvb-product-card__title">Your vibe,<br>exactly.</h2>
			</div>
			<div class="gvb-product-card__content">
				<p class="gvb-product-card__text">Good vibes are for everyone. That&rsquo;s why our bottles are flexible and easy to personalise.</p>
			</div>
		</div>

		<!-- card 3 -->
		<div class="gvb-product-card gvb-product-card--dark gvb-fade-up">
			<div class="gvb-product-card__media">
				<img class="gvb-product-card__bg" src="<?php echo esc_url( $img . '/card-nachhaltigkeit.png' ); ?>" alt="" />
				<h2 class="gvb-product-card__title">Sustainability<br>that lasts.</h2>
			</div>
			<div class="gvb-product-card__content">
				<p class="gvb-product-card__text">Our bottles are, above all, a real win for the environment. We may not save the planet &ndash; but we make it a little better.</p>
			</div>
		</div>


</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
