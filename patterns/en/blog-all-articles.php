<?php
/**
 * Title: EN Blog All Articles
 * Slug: gvb/en-blog-all-articles
 * Categories: gvb
 */
?>

<!-- wp:group {"className":"gvb-blog-all","style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"64px","right":"64px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-blog-all" style="padding-top:80px;padding-right:64px;padding-bottom:80px;padding-left:64px">

	<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"40px","fontWeight":"700","lineHeight":"1.08","letterSpacing":"-1.8px"}},"textColor":"gvb-graphite"} -->
	<h2 class="wp-block-heading has-gvb-graphite-color has-text-color" style="font-size:40px;font-weight:700;line-height:1.08;letter-spacing:-1.8px">All articles:</h2>
	<!-- /wp:heading -->

	<!-- wp:query {"query":{"perPage":6,"pages":0,"offset":0,"postType":"en_post","order":"desc","orderBy":"date","sticky":"","inherit":false},"className":"gvb-blog-grid"} -->
	<div class="wp-block-query gvb-blog-grid">

		<!-- wp:post-template {"className":"gvb-blog-grid__list","layout":{"type":"grid","columnCount":2}} -->

			<!-- wp:group {"className":"gvb-blog-card","style":{"spacing":{"padding":{"top":"18px","bottom":"24px","left":"24px","right":"24px"},"blockGap":"0"},"border":{"radius":"16px"},"shadow":"0px 3px 17px 0px rgba(0,0,0,0.08)"},"backgroundColor":"gvb-linen","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center","justifyContent":"left"}} -->
			<div class="wp-block-group gvb-blog-card has-gvb-linen-background-color has-background" style="border-radius:16px;box-shadow:0px 3px 17px 0px rgba(0,0,0,0.08);padding-top:18px;padding-right:24px;padding-bottom:24px;padding-left:24px;gap:0">

				<!-- wp:post-featured-image {"isLink":true,"className":"gvb-blog-card__thumb","width":"124px","height":"116px","style":{"border":{"radius":"10px"},"spacing":{"margin":{"right":"12px"}}}} /-->

				<!-- wp:group {"className":"gvb-blog-card__body","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
				<div class="wp-block-group gvb-blog-card__body">

					<!-- wp:post-title {"level":5,"isLink":true,"style":{"typography":{"fontSize":"24px","fontWeight":"700","lineHeight":"1.08","letterSpacing":"0.2px"}},"textColor":"gvb-graphite"} /-->

					<!-- wp:post-date {"format":"d.m.Y","style":{"typography":{"fontSize":"16px","lineHeight":"1.5","letterSpacing":"0.08px"}},"textColor":"gvb-orange"} /-->

					<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"excerptLength":20,"style":{"typography":{"fontSize":"16px","lineHeight":"1.2","letterSpacing":"0.08px"}},"className":"gvb-blog-card__excerpt"} /-->

				</div>
				<!-- /wp:group -->

			</div>
			<!-- /wp:group -->

		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
		<!-- wp:paragraph {"placeholder":"No articles published yet."} -->
		<p></p>
		<!-- /wp:paragraph -->
		<!-- /wp:query-no-results -->

		<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
		<!-- /wp:query-pagination -->

	</div>
	<!-- /wp:query -->

</div>
<!-- /wp:group -->
