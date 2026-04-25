<?php
/**
 * Title: Blog Featured Articles
 * Slug: gvb/blog-featured
 * Categories: gvb
 */
?>

<!-- wp:group {"className":"gvb-blog-featured","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-blog-featured">

	<!-- wp:query {"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","sticky":"only","inherit":false},"className":"gvb-blog-featured__query"} -->
	<div class="wp-block-query gvb-blog-featured__query">

		<!-- wp:post-template {"className":"gvb-blog-featured__list","layout":{"type":"default"}} -->

			<!-- wp:group {"className":"gvb-blog-featured__row","style":{"spacing":{"padding":{"top":"80px","bottom":"40px","left":"64px","right":"64px"},"blockGap":"64px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
			<div class="wp-block-group gvb-blog-featured__row" style="padding-top:80px;padding-right:64px;padding-bottom:40px;padding-left:64px;gap:64px">

				<!-- wp:group {"className":"gvb-blog-featured__content","layout":{"type":"constrained"}} -->
				<div class="wp-block-group gvb-blog-featured__content">

					<!-- wp:post-title {"level":4,"isLink":false,"style":{"typography":{"fontSize":"40px","fontWeight":"700","lineHeight":"1.08","letterSpacing":"0.2px"}},"textColor":"gvb-graphite"} /-->

					<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"style":{"typography":{"fontSize":"16px","lineHeight":"1.2","letterSpacing":"0.08px"}},"textColor":"gvb-graphite"} /-->

					<!-- wp:read-more {"content":"Mehr erfahren","className":"gvb-btn gvb-btn--orange","style":{"typography":{"fontSize":"12px","fontWeight":"700"},"border":{"radius":"51.575px"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"20px","right":"20px"}}}} -->
					<a class="wp-block-read-more gvb-btn gvb-btn--orange" style="border-radius:51.575px;padding-top:12px;padding-right:20px;padding-bottom:12px;padding-left:20px;font-size:12px;font-weight:700">Mehr erfahren</a>
					<!-- /wp:read-more -->

				</div>
				<!-- /wp:group -->

				<!-- wp:post-featured-image {"isLink":true,"className":"gvb-blog-featured__image","width":"638px","height":"432px","style":{"border":{"radius":"16px"}}} /-->

			</div>
			<!-- /wp:group -->

		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
		<!-- wp:paragraph {"placeholder":"Kein Artikel gefunden."} -->
		<p></p>
		<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->

	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->
