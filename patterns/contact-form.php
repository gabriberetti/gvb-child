<?php
/**
 * Title: Contact Form
 * Slug: gvb/contact-form
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:group {"className":"gvb-contact","style":{"spacing":{"padding":{"top":"60px","bottom":"80px","left":"20px","right":"52px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-contact" style="padding-top:60px;padding-right:52px;padding-bottom:80px;padding-left:20px">

	<!-- wp:group {"className":"gvb-contact__header","style":{"spacing":{"margin":{"bottom":"48px"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group gvb-contact__header" style="margin-bottom:48px">

		<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"40px","fontWeight":"700","lineHeight":"1.08","letterSpacing":"0.2px"}},"textColor":"gvb-graphite"} -->
		<h2 class="wp-block-heading has-gvb-graphite-color has-text-color" style="font-size:40px;font-weight:700;line-height:1.08;letter-spacing:0.2px">Good Vibes, jetzt und sofort!</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","lineHeight":"1.15","letterSpacing":"0.09px"}}} -->
		<p style="font-size:18px;line-height:1.15;letter-spacing:0.09px">Du hast Lust auf unsere Trinkflaschen oder bist neugierig geworden?<br>Dann schreib uns doch einfach, wir melden uns bei dir zurück.</p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"className":"gvb-contact__body","style":{"spacing":{"blockGap":{"left":"69px"}}}} -->
	<div class="wp-block-columns gvb-contact__body">

		<!-- wp:column {"width":"500px","className":"gvb-contact__image-col"} -->
		<div class="wp-block-column gvb-contact__image-col" style="flex-basis:500px">

			<!-- wp:image {"className":"gvb-contact__portrait","style":{"border":{"radius":"36px"}}} -->
			<figure class="wp-block-image gvb-contact__portrait" style="border-radius:36px">
				<img src="<?php echo esc_url( $img . '/contact-portrait.jpg' ); ?>" alt="Good Vibe Bottles Team" style="border-radius:36px" />
			</figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"600px","className":"gvb-contact__form-col"} -->
		<div class="wp-block-column gvb-contact__form-col" style="flex-basis:600px">

			<!-- wp:html -->
			<?php
			$form_id = 3;
			echo do_shortcode( '[fluentform id="' . intval( $form_id ) . '"]' );
			?>
			<!-- /wp:html -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</div>
<!-- /wp:group -->

<!-- wp:html -->
<script>
( function () {
	'use strict';

	/**
	 * GVB Contact Form — expandable section toggle.
	 *
	 * In Fluent Forms admin, set Container CSS Class (Advanced tab):
	 *   Custom HTML field     → gvb-trigger-group
	 *   Expanded Container    → gvb-form-expanded-container
	 *   Personalisierung checkbox → gvb-checkbox--personalisierung
	 */
	function initFormExpander() {
		var triggerGroup     = document.querySelector( '.gvb-trigger-group' );
		var expandedSections = document.querySelectorAll( '.gvb-form-expanded-container' );

		if ( ! triggerGroup || ! expandedSections.length ) {
			return;
		}

		var btn      = triggerGroup.querySelector( '.gvb-expand-trigger__btn' );
		var fileNote = triggerGroup.querySelector( '.gvb-file-note' );

		if ( ! btn ) return;

		btn.addEventListener( 'click', function () {
			var isOpen = btn.classList.toggle( 'is-open' );

			expandedSections.forEach( function ( section ) {
				section.classList.toggle( 'is-open', isOpen );
			} );

			btn.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );

			// Remove bottom border from trigger row when section is open.
			triggerGroup.classList.toggle( 'is-expanded', isOpen );

			// File format note: visible only when expanded.
			if ( fileNote ) {
				fileNote.classList.toggle( 'is-visible', isOpen );
			}
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', initFormExpander );
	} else {
		initFormExpander();
	}
} )();
</script>
<!-- /wp:html -->
