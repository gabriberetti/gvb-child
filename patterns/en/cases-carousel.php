<?php
/**
 * Title: EN Cases Carousel
 * Slug: gvb/en-cases-carousel
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:group {"className":"gvb-cases gvb-fade-up","style":{"spacing":{"margin":{"left":"20px","right":"20px"},"padding":{"top":"20px","bottom":"39px","left":"52px","right":"52px"}},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-cases gvb-fade-up" style="border-radius:20px;margin-left:20px;margin-right:20px;padding-top:20px;padding-right:52px;padding-bottom:39px;padding-left:52px">

	<img class="gvb-cases__bg" src="<?php echo esc_url( $img . '/cases-bg-1.png' ); ?>" alt="" aria-hidden="true" />

	<!-- wp:group {"className":"gvb-cases__tabs","layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-group gvb-cases__tabs">
		<button class="gvb-cases__tab is-active" data-tab="0">Case 1</button>
		<button class="gvb-cases__tab" data-tab="1">Case 2</button>
		<button class="gvb-cases__tab" data-tab="2">Case 3</button>
		<button class="gvb-cases__tab" data-tab="3">Case 4</button>
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"gvb-cases__panels","layout":{"type":"default"}} -->
	<div class="wp-block-group gvb-cases__panels">

		<div class="gvb-cases__panel is-layout-flow wp-block-group-is-layout-flow is-active" data-panel="0" data-bg="<?php echo esc_url( $img . '/cases-bg-1.png' ); ?>">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"32px","fontWeight":"400","lineHeight":"1.15","letterSpacing":"0.16px"}},"textColor":"gvb-linen"} -->
			<h3 class="wp-block-heading has-gvb-linen-color has-text-color" style="font-size:32px;font-weight:400;line-height:1.15;letter-spacing:0.16px">A great<br class="gvb-cases__h3-break"> match.</h3>
			<!-- /wp:heading -->

			<!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"40px","fontWeight":"700","lineHeight":"1.08","letterSpacing":"0.2px"}},"textColor":"gvb-linen"} -->
			<h4 class="wp-block-heading has-gvb-linen-color has-text-color" style="font-size:40px;font-weight:700;line-height:1.08;letter-spacing:0.2px">Good Vibe Bottles<br>X Your Company</h4>
			<!-- /wp:heading -->
		</div>

		<div class="gvb-cases__panel is-layout-flow wp-block-group-is-layout-flow" data-panel="1" data-bg="<?php echo esc_url( $img . '/cases-bg-2.png' ); ?>">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"32px","fontWeight":"400","lineHeight":"1.15","letterSpacing":"0.16px"}},"textColor":"gvb-linen"} -->
			<h3 class="wp-block-heading has-gvb-linen-color has-text-color" style="font-size:32px;font-weight:400;line-height:1.15;letter-spacing:0.16px">A great<br class="gvb-cases__h3-break"> match.</h3>
			<!-- /wp:heading -->

			<!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"40px","fontWeight":"700","lineHeight":"1.08","letterSpacing":"0.2px"}},"textColor":"gvb-linen"} -->
			<h4 class="wp-block-heading has-gvb-linen-color has-text-color" style="font-size:40px;font-weight:700;line-height:1.08;letter-spacing:0.2px">Good Vibe Bottles<br>X Your Sports Club</h4>
			<!-- /wp:heading -->
		</div>

		<div class="gvb-cases__panel is-layout-flow wp-block-group-is-layout-flow" data-panel="2" data-bg="<?php echo esc_url( $img . '/cases-bg-3.png' ); ?>">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"32px","fontWeight":"400","lineHeight":"1.15","letterSpacing":"0.16px"}},"textColor":"gvb-linen"} -->
			<h3 class="wp-block-heading has-gvb-linen-color has-text-color" style="font-size:32px;font-weight:400;line-height:1.15;letter-spacing:0.16px">A great<br class="gvb-cases__h3-break"> match.</h3>
			<!-- /wp:heading -->

			<!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"40px","fontWeight":"700","lineHeight":"1.08","letterSpacing":"0.2px"}},"textColor":"gvb-linen"} -->
			<h4 class="wp-block-heading has-gvb-linen-color has-text-color" style="font-size:40px;font-weight:700;line-height:1.08;letter-spacing:0.2px">Good Vibe Bottles<br>X Your Spa</h4>
			<!-- /wp:heading -->
		</div>

		<div class="gvb-cases__panel is-layout-flow wp-block-group-is-layout-flow" data-panel="3" data-bg="<?php echo esc_url( $img . '/cases-bg-4.png' ); ?>">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"32px","fontWeight":"400","lineHeight":"1.15","letterSpacing":"0.16px"}},"textColor":"gvb-linen"} -->
			<h3 class="wp-block-heading has-gvb-linen-color has-text-color" style="font-size:32px;font-weight:400;line-height:1.15;letter-spacing:0.16px">A great<br class="gvb-cases__h3-break"> match.</h3>
			<!-- /wp:heading -->

			<!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"40px","fontWeight":"700","lineHeight":"1.08","letterSpacing":"0.2px"}},"textColor":"gvb-linen"} -->
			<h4 class="wp-block-heading has-gvb-linen-color has-text-color" style="font-size:40px;font-weight:700;line-height:1.08;letter-spacing:0.2px">Good Vibe Bottles<br>X Your University</h4>
			<!-- /wp:heading -->
		</div>

	</div>
	<!-- /wp:group -->

	<div class="gvb-cases__mobile-nav" aria-hidden="true">
		<button class="gvb-cases__nav gvb-cases__nav--prev" aria-label="Previous case">&#8249;</button>
		<button class="gvb-cases__nav gvb-cases__nav--next" aria-label="Next case">&#8250;</button>
	</div>

</div>
<!-- /wp:group -->
