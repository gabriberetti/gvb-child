<?php
/**
 * Title: Tritan Brand Promise
 * Slug: gvb/tritan-brand-promise
 * Categories: gvb
 */
$svg = get_stylesheet_directory_uri() . '/assets/svg';
?>

<!-- wp:group {"className":"gvb-brand-promise","backgroundColor":"gvb-green","style":{"spacing":{"padding":{"top":"120px","bottom":"120px","left":"64px","right":"64px"}}},"layout":{"type":"constrained","contentSize":"808px"}} -->
<div class="wp-block-group gvb-brand-promise has-gvb-green-background-color has-background" style="padding-top:120px;padding-right:64px;padding-bottom:120px;padding-left:64px">

	<!-- wp:group {"className":"gvb-brand-promise__content","style":{"spacing":{"blockGap":"48px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group gvb-brand-promise__content">

		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"60px","fontWeight":"700","lineHeight":"1.03"}},"textColor":"gvb-linen"} -->
		<h2 class="wp-block-heading has-text-align-center has-gvb-linen-color has-text-color" style="font-size:60px;font-weight:700;line-height:1.03">Heute schon genug<br>getrunken?</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"24px","lineHeight":"1.2","letterSpacing":"0.12px"}},"textColor":"gvb-linen"} -->
		<p class="has-text-align-center has-gvb-linen-color has-text-color" style="font-size:24px;line-height:1.2;letter-spacing:0.12px">Entdecke unsere weiteren Trinkflaschenmodelle.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"gvb-btn--primary","style":{"border":{"radius":"50px"}}} -->
			<div class="wp-block-button gvb-btn--primary"><a class="wp-block-button__link" >Mehr erfahren</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

	</div>
	<!-- /wp:group -->

	<!-- wp:html -->
	<div class="gvb-chat-bubble">
		<img src="<?php echo esc_url( $svg . '/chat-bubble.svg' ); ?>" alt="" class="gvb-chat-bubble__bg" />
		<span class="gvb-chat-bubble__text">Chat with us!</span>
	</div>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
