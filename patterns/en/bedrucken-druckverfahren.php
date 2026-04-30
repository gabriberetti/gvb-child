<?php
/**
 * Title: EN Printing Processes
 * Slug: gvb/en-bedrucken-druckverfahren
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-druckverfahren">
	<div class="gvb-druckverfahren__header">
		<h2 class="gvb-druckverfahren__heading gvb-fade-up">Our printing processes.</h2>
		<p class="gvb-druckverfahren__intro gvb-fade-up">To make sure your design looks exactly as it should, we rely on high-quality printing techniques and trusted partners. As experts in different printing methods, we know exactly which one is right for your design &ndash; so your bottle is brought to life in the best possible way. Depending on your design, use case and desired look, we select the most suitable solution for you.</p>
	</div>

	<ul class="gvb-flaschen-cards__list gvb-flaschen-cards__list--4">
		<li class="gvb-flaschen-cards__item gvb-fade-up">
			<div class="gvb-flaschen-cards__image">
				<img src="<?php echo esc_url( $img . '/bedrucken-druck-1.jpg' ); ?>" alt="Digital printing" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Digital printing</h5>
				<p class="gvb-flaschen-cards__desc">Ideal for detailed designs, multiple colours and gradients. Delivers precise, vibrant results and allows for all-round printing as well as individual personalisation (e.g. names).</p>
			</div>
		</li>

		<li class="gvb-flaschen-cards__item gvb-fade-up">
			<div class="gvb-flaschen-cards__image">
				<img src="<?php echo esc_url( $img . '/bedrucken-druck-2.jpg' ); ?>" alt="Screen printing" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Screen printing</h5>
				<p class="gvb-flaschen-cards__desc">Perfect for clean designs and bold colours. Delivers consistent, durable results with a long-lasting finish &ndash; ideal for larger quantities.</p>
			</div>
		</li>

		<li class="gvb-flaschen-cards__item gvb-fade-up">
			<div class="gvb-flaschen-cards__image">
				<img class="gvb-img-right" src="<?php echo esc_url( $img . '/bedrucken-druck-3.jpg' ); ?>" alt="Laser engraving" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Laser engraving</h5>
				<p class="gvb-flaschen-cards__desc">A subtle, elegant and durable finish, especially for stainless steel &ndash; engraved directly into the surface for a timeless, high-quality look.</p>
			</div>
		</li>

		<li class="gvb-flaschen-cards__item gvb-fade-up">
			<div class="gvb-flaschen-cards__image">
				<img src="<?php echo esc_url( $img . '/bedrucken-druck-4.jpg' ); ?>" alt="Beyond the bottle" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Beyond the bottle</h5>
				<p class="gvb-flaschen-cards__desc">Branding doesn&rsquo;t stop at the bottle. We also personalise closures, sleeves and packaging &ndash; creating a consistent brand experience down to the last detail.</p>
			</div>
		</li>
	</ul>
</section>
<!-- /wp:html -->
