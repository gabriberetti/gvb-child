<?php
/**
 * Title: EN Printing Statement
 * Slug: gvb/en-bedrucken-statement
 * Categories: gvb
 *
 * Same 4-card structure as Solutions Personalisation but with the
 * Bedrucken-page image set. Heading + card content sourced from the
 * agency "Personalisation benefits" block.
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-personalisieren gvb-personalisieren--industry">

	<h2 class="gvb-personalisieren__heading gvb-fade-up">Your Brand. Your Statement.</h2>

	<div class="gvb-personalisieren__grid">

		<div class="gvb-personalisieren-card gvb-personalisieren-card--dark gvb-fade-up">
			<div class="gvb-personalisieren-card__media">
				<img class="gvb-personalisieren-card__img" src="<?php echo esc_url( $img . '/bedrucken-card-1.png' ); ?>" alt="Your brand &ndash; always visible" />
				<h3 class="gvb-personalisieren-card__title">Your brand &ndash;<br>always visible.</h3>
			</div>
			<div class="gvb-personalisieren-card__content">
				<p class="gvb-personalisieren-card__desc">Our bottles are used every day &ndash; at work, on the move or during sports. That&rsquo;s what makes them so effective: your logo stays visible and your brand top of mind.</p>
			</div>
		</div>

		<div class="gvb-personalisieren-card gvb-personalisieren-card--orange gvb-fade-up">
			<div class="gvb-personalisieren-card__media">
				<img class="gvb-personalisieren-card__img" src="<?php echo esc_url( $img . '/bedrucken-card-2.png' ); ?>" alt="A sustainable brand identity" />
				<h3 class="gvb-personalisieren-card__title">A sustainable<br>brand identity.</h3>
			</div>
			<div class="gvb-personalisieren-card__content">
				<p class="gvb-personalisieren-card__desc">Reusable bottles stand for responsibility, quality and conscious choices. With your branding, these values become part of your brand perception.</p>
			</div>
		</div>

		<div class="gvb-personalisieren-card gvb-personalisieren-card--orange gvb-fade-up">
			<div class="gvb-personalisieren-card__media">
				<img class="gvb-personalisieren-card__img" src="<?php echo esc_url( $img . '/bedrucken-card-3.png' ); ?>" alt="Personal and high-quality" />
				<h3 class="gvb-personalisieren-card__title">Personal &amp;<br>high-quality.</h3>
			</div>
			<div class="gvb-personalisieren-card__content">
				<p class="gvb-personalisieren-card__desc">Our personalised bottles are a thoughtful, high-quality alternative to traditional giveaways. Practical, durable and designed to create real appreciation &ndash; for employees, customers and partners.</p>
			</div>
		</div>

		<div class="gvb-personalisieren-card gvb-personalisieren-card--dark gvb-fade-up">
			<div class="gvb-personalisieren-card__media">
				<img class="gvb-personalisieren-card__img" src="<?php echo esc_url( $img . '/bedrucken-card-4.png' ); ?>" alt="Practical and made to be used" />
				<h3 class="gvb-personalisieren-card__title">Practical.<br>Made to be used.</h3>
			</div>
			<div class="gvb-personalisieren-card__content">
				<p class="gvb-personalisieren-card__desc">Our bottles are not disposable &ndash; they&rsquo;re made to be used every day. And that&rsquo;s exactly what makes them so effective. They naturally support healthy habits while creating real visibility and a positive, lasting presence for your brand.</p>
			</div>
		</div>

	</div>

</section>
<!-- /wp:html -->
