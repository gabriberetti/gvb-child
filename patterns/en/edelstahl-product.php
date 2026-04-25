<?php
/**
 * Title: EN Stainless Steel Product Showcase
 * Slug: gvb/en-edelstahl-product
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
					<img src="<?php echo esc_url( $img . '/edelstahl-product.jpg' ); ?>" alt="Stainless steel bottle &ndash; blue" />
				</div>
				<div class="gvb-bottle-card__slide">
					<img src="<?php echo esc_url( $img . '/edelstahl-silver.png' ); ?>" alt="Stainless steel bottle &ndash; silver" />
				</div>
				<div class="gvb-bottle-card__slide">
					<img src="<?php echo esc_url( $img . '/edelstahl-white.png' ); ?>" alt="Stainless steel bottle &ndash; white" />
				</div>
			</div>
		</div>

		<div class="gvb-bottle-card__content">

			<h2 class="gvb-bottle-card__title">Stainless Steel</h2>

			<div class="gvb-bottle-card__body">
				<p>Our premium stainless steel bottle combines robust design with high-performance insulation. Whether it&rsquo;s a quick refreshment or a coffee break on the go &ndash; it&rsquo;s designed to keep up with your daily routine. Sustainable materials meet thoughtful functionality. And if you like, we&rsquo;ll personalise it with your logo or design.</p>
				<p><strong>All benefits at a glance:</strong></p>
				<ul>
					<li>100% high-quality stainless steel (SS304/SS201)</li>
					<li>BPA-free and food-safe</li>
					<li>Taste- and odour-neutral</li>
					<li>Double-walled insulation</li>
					<li>Durable, robust and lightweight</li>
					<li>Other standard and custom Pantone colours are available upon request</li>
				</ul>
			</div>

			<div class="gvb-bottle-card__colors" role="tablist" aria-label="Choose colour">
				<button class="gvb-bottle-card__color-btn is-active" data-bottle-index="0" role="tab" aria-selected="true" aria-label="Colour blue">
					<img src="<?php echo esc_url( $img . '/edelstahl-color-1.svg' ); ?>" alt="" />
				</button>
				<button class="gvb-bottle-card__color-btn" data-bottle-index="1" role="tab" aria-selected="false" aria-label="Colour silver">
					<img src="<?php echo esc_url( $img . '/edelstahl-color-2.svg' ); ?>" alt="" />
				</button>
				<button class="gvb-bottle-card__color-btn" data-bottle-index="2" role="tab" aria-selected="false" aria-label="Colour white">
					<img src="<?php echo esc_url( $img . '/edelstahl-color-3.svg' ); ?>" alt="" />
				</button>
			</div>

			<div class="gvb-bottle-card__meta">
				<p>Size: 750 ml</p>
				<p>Includes stainless steel closure</p>
			</div>

		</div>

	</div>

</section>
<!-- /wp:html -->
