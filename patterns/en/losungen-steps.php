<?php
/**
 * Title: EN Solutions Steps (Order Process)
 * Slug: gvb/en-losungen-steps
 * Categories: gvb
 *
 * Step titles match the German pattern's structure (one title per step)
 * but use the agency doc's EN phrasing where it diverges. Step bodies
 * sourced from the agency "Order process" section.
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-steps">

	<div class="gvb-steps__intro">
		<h2 class="gvb-steps__heading">How to get your own<br>Good Vibe Bottles.</h2>
	</div>

	<div class="gvb-steps__rows">

		<!-- Step 1: content left, image right -->
		<div class="gvb-steps__row gvb-fade-up">
			<div class="gvb-steps__content">
				<span class="gvb-steps__number">1</span>
				<div class="gvb-steps__text">
					<h3>Your vibe.<br>Your bottle.</h3>
					<p>Pick from a range of options depending on the bottle. Choose your material, model, colour, size and closure &ndash; and you&rsquo;re almost done.</p>
				</div>
			</div>
			<div class="gvb-steps__image">
				<img src="<?php echo esc_url( $img . '/losungen-step-1.jpg' ); ?>" alt="Choose your bottle" />
			</div>
		</div>

		<!-- Step 2: image left, content right -->
		<div class="gvb-steps__row gvb-fade-up">
			<div class="gvb-steps__image">
				<img src="<?php echo esc_url( $img . '/losungen-step-2.jpg' ); ?>" alt="Send us your logo or design" />
			</div>
			<div class="gvb-steps__content">
				<span class="gvb-steps__number">2</span>
				<div class="gvb-steps__text">
					<h3>Make<br>it yours.</h3>
					<p>Want to take it a step further? Share your logo or design with us via the contact form and we&rsquo;ll handle the rest. As experts in different printing techniques, we know exactly how to bring your design to life &ndash; so your bottle looks just right.</p>
				</div>
			</div>
		</div>

		<!-- Step 3: content left, image right -->
		<div class="gvb-steps__row gvb-fade-up">
			<div class="gvb-steps__content">
				<span class="gvb-steps__number">3</span>
				<div class="gvb-steps__text">
					<h3>Sit back &amp; relax.</h3>
					<p>You&rsquo;ve sent everything? Perfect. We&rsquo;ll take it from here, have a sip and get back to you shortly.</p>
				</div>
			</div>
			<div class="gvb-steps__image">
				<img src="<?php echo esc_url( $img . '/losungen-step-3.jpg' ); ?>" alt="We take care of the rest" />
			</div>
		</div>

	</div>

</section>
<!-- /wp:html -->
