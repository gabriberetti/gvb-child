<?php
/**
 * Title: EN Our Bottles Cards
 * Slug: gvb/en-flaschen-cards
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-flaschen-cards">
	<ul class="gvb-flaschen-cards__list">

		<li class="gvb-flaschen-cards__item">
			<div class="gvb-flaschen-cards__image">
				<img src="<?php echo esc_url( $img . '/flaschen-edelstahl.png' ); ?>" alt="Stainless steel bottle" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Stainless steel</h5>
				<p class="gvb-flaschen-cards__desc">Discover our durable all-rounder, made from high-quality, food-grade stainless steel.</p>
				<a href="<?php echo esc_url( home_url( '/en/stainless-steel/' ) ); ?>" class="gvb-btn-primary">Find out more</a>
			</div>
		</li>

		<li class="gvb-flaschen-cards__item">
			<div class="gvb-flaschen-cards__image">
				<img src="<?php echo esc_url( $img . '/flaschen-tritan.png' ); ?>" alt="Tritan bottle" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Tritan</h5>
				<p class="gvb-flaschen-cards__desc">Our Tritan bottles are BPA-free and free from microplastics &ndash; made for everyday use.</p>
				<a href="<?php echo esc_url( home_url( '/en/tritan/' ) ); ?>" class="gvb-btn-primary">Find out more</a>
			</div>
		</li>

		<li class="gvb-flaschen-cards__item">
			<div class="gvb-flaschen-cards__image">
				<img src="<?php echo esc_url( $img . '/flaschen-borosilikat.png' ); ?>" alt="Borosilicate glass bottle" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Borosilicate glass</h5>
				<p class="gvb-flaschen-cards__desc">Our premium glass bottles combine elegant design with a range of models and closure options.</p>
				<a href="<?php echo esc_url( home_url( '/en/borosilicate-glass/' ) ); ?>" class="gvb-btn-primary">Find out more</a>
			</div>
		</li>

	</ul>
</section>
<!-- /wp:html -->
