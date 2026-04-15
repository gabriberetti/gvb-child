<?php
/**
 * Title: Product Cards
 * Slug: gvb/product-cards
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:group {"className":"gvb-product-cards","style":{"spacing":{"padding":{"left":"20px","right":"20px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-product-cards" style="padding-left:20px;padding-right:20px">

	<!-- wp:group {"className":"gvb-product-cards__track","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group gvb-product-cards__track">

		<!-- card 1 -->
		<div class="gvb-product-card gvb-product-card--dark gvb-fade-up">
			<div class="gvb-product-card__media">
				<img class="gvb-product-card__bg" src="<?php echo esc_url( $img . '/card-besser-trinken.png' ); ?>" alt="" />
				<h2 class="gvb-product-card__title">Besser trinken.</h2>
			</div>
			<div class="gvb-product-card__content">
				<p class="gvb-product-card__text">Mach das Richtige: Mit unseren Trinkflaschen aus nachhaltigen Materialien und echten Good Vibes trinkst du einfach besser.</p>
			</div>
		</div>

		<!-- card 2 -->
		<div class="gvb-product-card gvb-product-card--orange gvb-fade-up">
			<div class="gvb-product-card__media">
				<img class="gvb-product-card__bg" src="<?php echo esc_url( $img . '/card-genau-dein-vibe.png' ); ?>" alt="" />
				<h2 class="gvb-product-card__title">Genau<br>dein Vibe.</h2>
			</div>
			<div class="gvb-product-card__content">
				<p class="gvb-product-card__text">Good Vibes sind für alle da. Genau aus diesem Grund sind unsere Flaschen super flexibel und lassen sich ganz einfach personalisieren.</p>
			</div>
		</div>

		<!-- card 3 -->
		<div class="gvb-product-card gvb-product-card--dark gvb-fade-up">
			<div class="gvb-product-card__media">
				<img class="gvb-product-card__bg" src="<?php echo esc_url( $img . '/card-nachhaltigkeit.png' ); ?>" alt="" />
				<h2 class="gvb-product-card__title">Nachhaltigkeit,<br>die bleibt.</h2>
			</div>
			<div class="gvb-product-card__content">
				<p class="gvb-product-card__text">Unsere Trinkflaschen sind vor allem eines: ein echter Gewinn für die Umwelt. Wir retten vielleicht nicht den Planeten, aber machen ihn ein Stückchen besser.</p>
			</div>
		</div>


</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
