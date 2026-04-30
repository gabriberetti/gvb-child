<?php
/**
 * Title: EN Solutions Branding
 * Slug: gvb/en-losungen-branding
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:group {"className":"gvb-branding","style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"20px","right":"20px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-branding" style="padding-top:80px;padding-bottom:80px;padding-left:20px;padding-right:20px">

	<!-- wp:html -->
	<div class="gvb-branding__inner">

		<div class="gvb-branding__image">
			<img src="<?php echo esc_url( $img . '/losungen-branding.jpg' ); ?>" alt="Good Vibe Bottles branding" />
		</div>

		<div class="gvb-branding__content">
			<h2 class="gvb-branding__heading gvb-fade-up">Your vibe.<br>Your bottle.<br>Your branding.</h2>
			<p class="gvb-branding__text gvb-fade-up">We personalise your Good Vibe Bottles to match your brand &ndash; across all models and details, from the bottle itself to closure and accessories.</p>
			<p class="gvb-branding__text gvb-fade-up">From high-quality digital printing to refined engraving, we make sure your design is showcased exactly the way it should be. You choose the bottle &ndash; we take care of the rest.</p>
			<a href="/en/our-bottles/" class="gvb-btn-primary gvb-fade-up">Find out more</a>
		</div>

	</div>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
