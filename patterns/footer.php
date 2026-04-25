<?php
/**
 * Title: Footer
 * Slug: gvb/footer
 * Categories: gvb
 * Block Types: core/template-part/footer
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
$svg = get_stylesheet_directory_uri() . '/assets/svg';
?>

<!-- wp:group {"className":"gvb-footer","backgroundColor":"gvb-linen","style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"52px","right":"64px"}}},"layout":{"type":"constrained","contentSize":"1200px"}} -->
<div class="wp-block-group gvb-footer has-gvb-linen-background-color has-background" style="padding-top:80px;padding-right:64px;padding-bottom:80px;padding-left:52px">

	<!-- wp:columns {"className":"gvb-footer__inner","style":{"spacing":{"blockGap":{"left":"120px"}}}} -->
	<div class="wp-block-columns gvb-footer__inner">

		<!-- wp:column {"width":"33%","className":"gvb-footer__brand"} -->
		<div class="wp-block-column gvb-footer__brand" style="flex-basis:33%">

			<!-- wp:image {"width":"175px","height":"53px","className":"gvb-footer__logo"} -->
			<figure class="wp-block-image is-resized gvb-footer__logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Zur Startseite', 'gvb' ); ?>">
					<img src="<?php echo esc_url( $img . '/gvb-logo-orange.png' ); ?>" alt="Good Vibe Bottles" style="width:175px;height:53px" />
				</a>
			</figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"className":"gvb-footer__tagline","textColor":"gvb-green","style":{"typography":{"fontSize":"16px","lineHeight":"1.2","letterSpacing":"0.08px"},"spacing":{"margin":{"top":"56px"}}}} -->
			<p class="gvb-footer__tagline has-gvb-green-color has-text-color" style="margin-top:56px;font-size:16px;line-height:1.2;letter-spacing:0.08px">Good Vibes Only. Great Hydration Always.</p>
			<!-- /wp:paragraph -->

			<!-- wp:group {"className":"gvb-footer__social","style":{"spacing":{"blockGap":"24px","margin":{"top":"56px"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group gvb-footer__social" style="margin-top:56px">
				<a href="https://www.instagram.com/goodvibebottles" target="_blank" rel="noopener noreferrer" class="gvb-footer__social-link">
					<img src="<?php echo esc_url( $svg . '/icon-instagram.svg' ); ?>" alt="Instagram" width="24" height="24" />
				</a>
				<a href="https://www.linkedin.com/company/good-vibe-bottles/" target="_blank" rel="noopener noreferrer" class="gvb-footer__social-link">
					<img src="<?php echo esc_url( $svg . '/icon-linkedin.svg' ); ?>" alt="LinkedIn" width="24" height="24" />
				</a>
			</div>
			<!-- /wp:group -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"67%","className":"gvb-footer__nav-wrap"} -->
		<div class="wp-block-column gvb-footer__nav-wrap" style="flex-basis:67%">

			<!-- wp:columns {"className":"gvb-footer__nav","style":{"spacing":{"blockGap":{"left":"32px"}}}} -->
			<div class="wp-block-columns gvb-footer__nav">

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:heading {"level":6,"className":"gvb-footer__nav-heading","textColor":"gvb-green","style":{"typography":{"fontSize":"15px","fontWeight":"400","letterSpacing":"-0.3px","lineHeight":"1"},"spacing":{"margin":{"bottom":"16px"}}}} -->
					<h6 class="wp-block-heading gvb-footer__nav-heading has-gvb-green-color has-text-color" style="margin-bottom:16px;font-size:15px;font-weight:400;letter-spacing:-0.3px;line-height:1"><a href="/unsere-flaschen/">Unsere Flaschen</a></h6>
					<!-- /wp:heading -->
					<!-- wp:list {"className":"gvb-footer__nav-list","textColor":"gvb-green","style":{"typography":{"fontSize":"16px","lineHeight":"1.2","letterSpacing":"0.08px"},"spacing":{"blockGap":"8px"}}} -->
					<ul class="wp-block-list gvb-footer__nav-list has-gvb-green-color has-text-color" style="font-size:16px;line-height:1.2;letter-spacing:0.08px">
						<li><a href="/edelstahl/">Edelstahl</a></li>
						<li><a href="/borosilikatglas/">Borosilikatglas</a></li>
						<li><a href="/tritan/">Tritan</a></li>
						<li class="gvb-footer__nav-divider"><a href="/download/">Preisliste</a></li>
						<li><a href="">Druckleitfaden</a></li>
					</ul>
					<!-- /wp:list -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:heading {"level":6,"className":"gvb-footer__nav-heading","textColor":"gvb-green","style":{"typography":{"fontSize":"15px","fontWeight":"400","letterSpacing":"-0.3px","lineHeight":"1"},"spacing":{"margin":{"bottom":"16px"}}}} -->
					<h6 class="wp-block-heading gvb-footer__nav-heading has-gvb-green-color has-text-color" style="margin-bottom:16px;font-size:15px;font-weight:400;letter-spacing:-0.3px;line-height:1"><a href="/unsere-losungen/">Unsere Lösungen</a></h6>
					<!-- /wp:heading -->
					<!-- wp:list {"className":"gvb-footer__nav-list","textColor":"gvb-green","style":{"typography":{"fontSize":"16px","lineHeight":"1.2","letterSpacing":"0.08px"},"spacing":{"blockGap":"8px"}}} -->
					<ul class="wp-block-list gvb-footer__nav-list has-gvb-green-color has-text-color" style="font-size:16px;line-height:1.2;letter-spacing:0.08px">
						<li><a href="/unternehmen/">Unternehmen</a></li>
						<li><a href="/sportvereine/">Sport</a></li>
						<li><a href="/gesundheitswesen/">Gesundheit</a></li>
						<li><a href="/hotel-wellness-und-spa/">Hotels</a></li>
						<li><a href="/bildungseinrichtungen/">Bildung</a></li>
						<li class="gvb-footer__nav-divider"><a href="/bedrucken/">Bedrucken</a></li>
					</ul>
					<!-- /wp:list -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:heading {"level":6,"className":"gvb-footer__nav-heading","textColor":"gvb-green","style":{"typography":{"fontSize":"15px","fontWeight":"400","letterSpacing":"-0.3px","lineHeight":"1"},"spacing":{"margin":{"bottom":"16px"}}}} -->
					<h6 class="wp-block-heading gvb-footer__nav-heading has-gvb-green-color has-text-color" style="margin-bottom:16px;font-size:15px;font-weight:400;letter-spacing:-0.3px;line-height:1"><a href="/uber-uns/">Über uns</a></h6>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:heading {"level":6,"className":"gvb-footer__nav-heading","textColor":"gvb-green","style":{"typography":{"fontSize":"15px","fontWeight":"400","letterSpacing":"-0.3px","lineHeight":"1"},"spacing":{"margin":{"bottom":"0px"}}}} -->
					<h6 class="wp-block-heading gvb-footer__nav-heading has-gvb-green-color has-text-color" style="margin-bottom:0px;font-size:15px;font-weight:400;line-height:1"><a href="/blog/">Blog</a></h6>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:heading {"level":6,"className":"gvb-footer__nav-heading","textColor":"gvb-green","style":{"typography":{"fontSize":"15px","fontWeight":"400","letterSpacing":"-0.3px","lineHeight":"1"},"spacing":{"margin":{"bottom":"0px"}}}} -->
					<h6 class="wp-block-heading gvb-footer__nav-heading has-gvb-green-color has-text-color" style="margin-bottom:0px;font-size:15px;font-weight:400;line-height:1"><a href="/impressum/">Impressum</a></h6>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column">
					<!-- wp:heading {"level":6,"className":"gvb-footer__nav-heading","textColor":"gvb-green","style":{"typography":{"fontSize":"15px","fontWeight":"400","letterSpacing":"-0.3px","lineHeight":"1"},"spacing":{"margin":{"bottom":"0px"}}}} -->
					<h6 class="wp-block-heading gvb-footer__nav-heading has-gvb-green-color has-text-color" style="margin-bottom:0px;font-size:15px;font-weight:400;line-height:1"><a href="/faq/">FAQ</a></h6>
					<!-- /wp:heading -->
				</div>
				<!-- /wp:column -->

			</div>
			<!-- /wp:columns -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->
