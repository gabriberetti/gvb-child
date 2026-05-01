<?php
/**
 * Title: EN FAQ Hero
 * Slug: gvb/en-faq-hero
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:group {"className":"gvb-hero gvb-hero--faq","style":{"spacing":{"padding":{"top":"120px","bottom":"120px","left":"64px","right":"64px"},"margin":{"left":"20px","right":"20px"}},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-hero gvb-hero--faq" style="border-radius:20px;margin-left:20px;margin-right:20px;padding-top:120px;padding-right:64px;padding-bottom:120px;padding-left:64px">

	<img class="gvb-hero__bg gvb-hero__bg--faq" src="<?php echo esc_url( $img . '/hero-faq.webp' ); ?>" alt="" aria-hidden="true" />
	<div class="gvb-hero__overlay" style="background:linear-gradient(109deg, rgba(0,0,0,0) 43%, rgba(0,0,0,0.18) 58%, rgba(0,0,0,0.2) 96%)"></div>

	<!-- wp:group {"className":"gvb-hero__content","style":{"spacing":{"margin":{"left":"auto"}}},"layout":{"type":"constrained","contentSize":"608px"}} -->
	<div class="wp-block-group gvb-hero__content" style="margin-left:auto">

		<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"clamp(35.641px, 2.228rem + ((1vw - 3.2px) * 2.621), 65px)","fontWeight":"700","lineHeight":"1","letterSpacing":"-1.95px"}},"textColor":"gvb-linen"} -->
		<h1 class="wp-block-heading has-gvb-linen-color has-text-color" style="font-size:clamp(35.641px, 2.228rem + ((1vw - 3.2px) * 2.621), 65px);font-weight:700;line-height:1;letter-spacing:-1.95px">FAQ</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"32px","fontWeight":"400","lineHeight":"1.15","letterSpacing":"0.16px"}},"textColor":"gvb-linen"} -->
		<p class="has-gvb-linen-color has-text-color" style="font-size:32px;font-weight:400;line-height:1.15;letter-spacing:0.16px">Got questions? We have answers.</p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
