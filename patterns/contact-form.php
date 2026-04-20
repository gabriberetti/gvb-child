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

	/**
	 * Replace the browser's English HTML5 validation tooltips
	 * (e.g. "Value must be greater than or equal to 50") with German text.
	 */
	function initGermanValidation() {
		var form = document.querySelector( '.gvb-contact__form-col .fluentform form, .gvb-contact__form-col form' );
		if ( ! form ) return;

		function messageFor( input ) {
			var v = input.validity;
			if ( v.valueMissing )    return 'Bitte fülle dieses Feld aus.';
			if ( v.typeMismatch )    return 'Bitte gib einen gültigen Wert ein.';
			if ( v.patternMismatch ) return 'Bitte halte dich an das geforderte Format.';
			if ( v.tooShort )        return 'Bitte gib mindestens ' + input.minLength + ' Zeichen ein.';
			if ( v.tooLong )         return 'Bitte gib höchstens ' + input.maxLength + ' Zeichen ein.';
			if ( v.rangeUnderflow )  return 'Der Wert muss mindestens ' + input.min + ' betragen.';
			if ( v.rangeOverflow )   return 'Der Wert darf höchstens ' + input.max + ' betragen.';
			if ( v.stepMismatch )    return 'Bitte gib einen gültigen Wert ein.';
			if ( v.badInput )        return 'Bitte gib einen gültigen Wert ein.';
			return '';
		}

		form.querySelectorAll( 'input, select, textarea' ).forEach( function ( el ) {
			el.addEventListener( 'invalid', function () {
				el.setCustomValidity( messageFor( el ) );
			} );
			el.addEventListener( 'input', function () {
				el.setCustomValidity( '' );
			} );
		} );
	}

	function init() {
		initFormExpander();
		initGermanValidation();
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();
</script>
<!-- /wp:html -->
