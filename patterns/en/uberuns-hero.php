<?php
/**
 * Title: EN About Us Hero
 * Slug: gvb/en-uberuns-hero
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:group {"className":"gvb-hero gvb-hero--uberuns","style":{"spacing":{"padding":{"top":"110px","bottom":"120px","left":"64px","right":"64px"},"margin":{"left":"20px","right":"20px"}},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-hero gvb-hero--uberuns" style="border-radius:20px;margin-left:20px;margin-right:20px;padding-top:110px;padding-right:64px;padding-bottom:120px;padding-left:64px">

	<img class="gvb-hero__bg gvb-hero__bg--uberuns" src="<?php echo esc_url( $img . '/hero-uberuns.webp' ); ?>" alt="" aria-hidden="true" />
	<div class="gvb-hero__overlay" style="background:linear-gradient(110deg, rgba(0,0,0,0) 44%, rgba(0,0,0,0.34) 55%)"></div>

	<!-- wp:group {"className":"gvb-hero__content","style":{"spacing":{"margin":{"left":"auto"}}},"layout":{"type":"constrained","contentSize":"608px"}} -->
	<div class="wp-block-group gvb-hero__content" style="margin-left:auto">

		<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"clamp(35.641px, 2.228rem + ((1vw - 3.2px) * 2.621), 65px)","fontWeight":"700","lineHeight":"1","letterSpacing":"-1.95px"}},"textColor":"gvb-linen"} -->
		<h1 class="wp-block-heading has-gvb-linen-color has-text-color" style="font-size:clamp(35.641px, 2.228rem + ((1vw - 3.2px) * 2.621), 65px);font-weight:700;line-height:1;letter-spacing:-1.95px">About us</h1>
		<!-- /wp:heading -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
