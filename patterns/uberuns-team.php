<?php
/**
 * Title: Über uns Team Photo
 * Slug: gvb/uberuns-team
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<div class="gvb-uberuns-team">
	<!-- Heading rendered here AND in uberuns-personen — CSS toggles which
	     one is visible per breakpoint so the reading order is correct in
	     both desktop (image → heading → text) and tablet/mobile (heading
	     → image → text). -->
	<h2 class="gvb-uberuns-team__heading">Wer sind wir</h2>
	<div class="gvb-uberuns-team__img">
		<img src="<?php echo esc_url( $img . '/uberuns-team.jpg' ); ?>" alt="Das Good Vibe Bottles Team" />
	</div>
</div>
<!-- /wp:html -->
