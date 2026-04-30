<?php
/**
 * Title: EN Blog Featured Articles
 * Slug: gvb/en-blog-featured
 * Categories: gvb
 *
 * Queries the en_post CPT (English blog posts). Sticky-post filter
 * doesn't apply to CPTs — featured posts will need an ACF boolean field
 * `is_featured` once en_post entries are populated, or the query can
 * filter on a meta key. For initial launch (no posts yet), the query
 * returns nothing and the no-results placeholder is shown.
 */
?>

<!-- wp:group {"className":"gvb-blog-featured","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-blog-featured">

	<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"en_post","order":"desc","orderBy":"date","sticky":"only","inherit":false},"className":"gvb-blog-featured__query"} -->
	<div class="wp-block-query gvb-blog-featured__query">

		<!-- wp:post-template {"className":"gvb-blog-featured__list","layout":{"type":"default"}} -->

			<!-- wp:group {"className":"gvb-blog-featured__row","style":{"spacing":{"padding":{"top":"80px","bottom":"40px","left":"64px","right":"64px"},"blockGap":"64px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
			<div class="wp-block-group gvb-blog-featured__row" style="padding-top:80px;padding-right:64px;padding-bottom:40px;padding-left:64px;gap:64px">

				<!-- wp:group {"className":"gvb-blog-featured__content","layout":{"type":"constrained"}} -->
				<div class="wp-block-group gvb-blog-featured__content">

					<!-- wp:post-title {"level":4,"isLink":false,"style":{"typography":{"fontSize":"clamp(40px, 2.778vw, 71px)","fontWeight":"700","lineHeight":"1.08","letterSpacing":"0.2px"}},"textColor":"gvb-graphite"} /-->

					<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"style":{"typography":{"fontSize":"clamp(16px, 1.111vw, 28px)","lineHeight":"1.2","letterSpacing":"0.08px"}},"textColor":"gvb-graphite"} /-->

					<!-- wp:read-more {"content":"Find out more","className":"gvb-btn gvb-btn--orange","style":{"typography":{"fontSize":"clamp(12px, 0.833vw, 21px)","fontWeight":"700"},"border":{"radius":"51.575px"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"20px","right":"20px"}}}} -->
					<a class="wp-block-read-more gvb-btn gvb-btn--orange" style="border-radius:51.575px;padding-top:12px;padding-right:20px;padding-bottom:12px;padding-left:20px;font-size:clamp(12px, 0.833vw, 21px);font-weight:700">Find out more</a>
					<!-- /wp:read-more -->

				</div>
				<!-- /wp:group -->

				<!-- wp:post-featured-image {"isLink":true,"className":"gvb-blog-featured__image","width":"638px","height":"432px","style":{"border":{"radius":"16px"}}} /-->

			</div>
			<!-- /wp:group -->

		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
		<!-- wp:paragraph {"placeholder":"No articles found."} -->
		<p></p>
		<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->

	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->
