<?php
/**
 * Title: EN Category Hero
 * Slug: gvb/en-category-hero
 * Categories: gvb
 *
 * EN mirror of category-hero.php. Renders the current en_category
 * name as the H1 via <wp:query-title type="archive" showPrefix="false" />
 * so one pattern serves all EN categories. Hero image shared with the
 * EN blog listing.
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:group {"className":"gvb-hero gvb-hero--blog","style":{"spacing":{"padding":{"top":"120px","bottom":"120px","left":"64px","right":"64px"}},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-hero gvb-hero--blog" style="border-radius:20px;padding-top:120px;padding-right:64px;padding-bottom:120px;padding-left:64px">

	<img class="gvb-hero__bg" src="<?php echo esc_url( $img . '/hero-blog.webp' ); ?>" alt="" aria-hidden="true" onerror="this.src='<?php echo esc_url( $img . '/hero-home.webp' ); ?>'" />
	<div class="gvb-hero__overlay" style="background:linear-gradient(110deg, rgba(0,0,0,0) 44%, rgba(0,0,0,0.34) 55%)"></div>

	<!-- wp:group {"className":"gvb-hero__content gvb-hero__content--blog","layout":{"type":"constrained","contentSize":"608px"}} -->
	<div class="wp-block-group gvb-hero__content gvb-hero__content--blog">

		<!-- wp:query-title {"type":"archive","showPrefix":false,"style":{"typography":{"fontSize":"65px","fontWeight":"700","lineHeight":"1","letterSpacing":"-1.95px"}},"textColor":"gvb-linen"} /-->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
