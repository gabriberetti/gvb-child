<?php
/**
 * Title: EN Contact Form
 * Slug: gvb/en-contact-form
 * Categories: gvb
 *
 * Embeds the EN-translated Fluent Forms form (form ID 5, duplicated
 * from the German form ID 3 / 4 and translated in the Fluent Forms
 * admin). Field labels, placeholders, validation messages and
 * confirmation email live in the plugin admin and are translated
 * there — only the form ID is wired here.
 *
 * Inline JS validation messages translated to EN here (overrides
 * browser HTML5 default English — already English on most browsers,
 * but ensures consistency for non-EN-locale browsers).
 */
$img     = get_stylesheet_directory_uri() . '/assets/img';
$form_id = 5; // EN form (duplicate of DE form, translated in admin)
?>

<!-- wp:group {"tagName":"section","anchor":"contact","className":"gvb-contact","style":{"spacing":{"padding":{"top":"60px","bottom":"80px","left":"20px","right":"52px"}}},"layout":{"type":"default"}} -->
<section id="contact" class="wp-block-group gvb-contact" style="padding-top:60px;padding-right:52px;padding-bottom:80px;padding-left:20px">

	<!-- wp:group {"className":"gvb-contact__header","style":{"spacing":{"margin":{"bottom":"48px"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group gvb-contact__header" style="margin-bottom:48px">

		<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"clamp(40px, 2.778vw, 71px)","fontWeight":"700","lineHeight":"1.08","letterSpacing":"0.2px"}},"textColor":"gvb-graphite"} -->
		<h2 class="wp-block-heading has-gvb-graphite-color has-text-color" style="font-size:clamp(40px, 2.778vw, 71px);font-weight:700;line-height:1.08;letter-spacing:0.2px">Good vibes, right here, right now!</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"clamp(18px, 1.25vw, 32px)","lineHeight":"1.15","letterSpacing":"0.09px"}}} -->
		<p style="font-size:clamp(18px, 1.25vw, 32px);line-height:1.15;letter-spacing:0.09px">Got a feel for our bottles or just curious?<br>Just drop us a message &ndash; we&rsquo;ll get back to you shortly.</p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"className":"gvb-contact__body","style":{"spacing":{"blockGap":{"left":"69px"}}}} -->
	<div class="wp-block-columns gvb-contact__body">

		<!-- wp:column {"width":"500px","className":"gvb-contact__image-col"} -->
		<div class="wp-block-column gvb-contact__image-col" style="flex-basis:500px">

			<!-- wp:image {"className":"gvb-contact__portrait","style":{"border":{"radius":"36px"}}} -->
			<figure class="wp-block-image gvb-contact__portrait" style="border-radius:36px">
				<img src="<?php echo esc_url( $img . '/contact-portrait.jpg' ); ?>" alt="Good Vibe Bottles team" style="border-radius:36px" />
			</figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"600px","className":"gvb-contact__form-col"} -->
		<div class="wp-block-column gvb-contact__form-col" style="flex-basis:600px">

			<!-- wp:html -->
			<?php
			echo do_shortcode( '[fluentform id="' . intval( $form_id ) . '"]' );
			?>
			<!-- /wp:html -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

</section>
<!-- /wp:group -->

<!-- wp:html -->
<script>
( function () {
	'use strict';

	/**
	 * GVB Contact Form (EN) — expandable section toggle.
	 * Same admin Container CSS Class names as DE form:
	 *   Custom HTML field     → gvb-trigger-group
	 *   Expanded Container    → gvb-form-expanded-container
	 *   Personalisation checkbox → gvb-checkbox--personalisierung
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
			triggerGroup.classList.toggle( 'is-expanded', isOpen );
			if ( fileNote ) {
				fileNote.classList.toggle( 'is-visible', isOpen );
			}
		} );
	}

	/**
	 * English HTML5 validation tooltips (browser defaults are usually
	 * already English, but this ensures consistency for non-EN-locale
	 * browsers viewing the EN page).
	 */
	function initEnglishValidation() {
		var form = document.querySelector( '.gvb-contact__form-col .fluentform form, .gvb-contact__form-col form' );
		if ( ! form ) return;

		function messageFor( input ) {
			var v = input.validity;
			if ( v.valueMissing )    return 'Please fill in this field.';
			if ( v.typeMismatch )    return 'Please enter a valid value.';
			if ( v.patternMismatch ) return 'Please match the requested format.';
			if ( v.tooShort )        return 'Please enter at least ' + input.minLength + ' characters.';
			if ( v.tooLong )         return 'Please enter at most ' + input.maxLength + ' characters.';
			if ( v.rangeUnderflow )  return 'The value must be at least ' + input.min + '.';
			if ( v.rangeOverflow )   return 'The value must be at most ' + input.max + '.';
			if ( v.stepMismatch )    return 'Please enter a valid value.';
			if ( v.badInput )        return 'Please enter a valid value.';
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
		initEnglishValidation();
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();
</script>
<!-- /wp:html -->
