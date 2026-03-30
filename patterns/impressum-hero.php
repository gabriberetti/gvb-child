<?php
/**
 * Title: Impressum Hero
 * Slug: gvb/impressum-hero
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:group {"className":"gvb-hero gvb-hero--impressum","style":{"spacing":{"padding":{"top":"120px","bottom":"120px","left":"64px","right":"64px"},"margin":{"left":"20px","right":"20px"}},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-hero gvb-hero--impressum" style="border-radius:20px;margin-left:20px;margin-right:20px;padding-top:120px;padding-right:64px;padding-bottom:120px;padding-left:64px">

	<img class="gvb-hero__bg gvb-hero__bg--impressum" src="<?php echo esc_url( $img . '/hero-uberuns.jpg' ); ?>" alt="" aria-hidden="true" />
	<div class="gvb-hero__overlay" style="background:linear-gradient(252deg, rgba(0,0,0,0) 42%, rgba(0,0,0,0.18) 70%, rgba(0,0,0,0.2) 91%)"></div>

	<!-- wp:group {"className":"gvb-hero__content","style":{"spacing":{"margin":{"left":"0px"}}},"layout":{"type":"constrained","contentSize":"608px"}} -->
	<div class="wp-block-group gvb-hero__content" style="margin-left:0px">

		<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"clamp(35.641px, 2.228rem + ((1vw - 3.2px) * 2.621), 65px)","fontWeight":"700","lineHeight":"1","letterSpacing":"-1.95px"}},"textColor":"gvb-linen"} -->
		<h1 class="wp-block-heading has-gvb-linen-color has-text-color" style="font-size:clamp(35.641px, 2.228rem + ((1vw - 3.2px) * 2.621), 65px);font-weight:700;line-height:1;letter-spacing:-1.95px">Impressum</h1>
		<!-- /wp:heading -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
