<?php
/**
 * Title: EN Hero Home
 * Slug: gvb/en-hero-home
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:group {"className":"gvb-hero","style":{"spacing":{"padding":{"top":"110px","bottom":"120px","left":"64px","right":"64px"},"margin":{"left":"20px","right":"20px"}},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-hero" style="border-radius:20px;margin-left:20px;margin-right:20px;padding-top:110px;padding-right:64px;padding-bottom:120px;padding-left:64px">

	<img class="gvb-hero__bg" src="<?php echo esc_url( $img . '/hero-home.jpg' ); ?>" alt="" aria-hidden="true" />
	<div class="gvb-hero__overlay" style="background:linear-gradient(110deg, rgba(0,0,0,0) 44%, rgba(0,0,0,0.34) 55%)"></div>

	<!-- wp:group {"className":"gvb-hero__content","style":{"spacing":{"margin":{"left":"auto"}}},"layout":{"type":"constrained","contentSize":"608px"}} -->
	<div class="wp-block-group gvb-hero__content" style="margin-left:auto">

		<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"clamp(65px, 4.514vw, 116px)","fontWeight":"700","lineHeight":"1","letterSpacing":"-1.95px"}},"textColor":"gvb-linen"} -->
		<h1 class="wp-block-heading" style="font-size:clamp(65px, 4.514vw, 116px);font-weight:700;line-height:1;letter-spacing:-1.95px"><span class="has-gvb-linen-color has-text-color">Good Vibes Only.</span><br><span class="has-gvb-white-color has-text-color">Great Hydration Always.</span></h1>
		<!-- /wp:heading -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
