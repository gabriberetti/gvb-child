<?php
/**
 * Title: Lösungen Branding
 * Slug: gvb/losungen-branding
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:group {"className":"gvb-branding","style":{"spacing":{"padding":{"top":"80px","bottom":"80px","left":"20px","right":"20px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-branding" style="padding-top:80px;padding-bottom:80px;padding-left:20px;padding-right:20px">

	<!-- wp:html -->
	<div class="gvb-branding__inner">

		<div class="gvb-branding__image">
			<img src="<?php echo esc_url( $img . '/losungen-branding.jpg' ); ?>" alt="Good Vibe Bottles Branding" />
		</div>

		<div class="gvb-branding__content">
			<h2 class="gvb-branding__heading">Dein Vibe.<br>Deine Flasche.<br>Dein Branding.</h2>
			<p class="gvb-branding__text">Gerne personalisieren wir deine Good Vibe Bottles. Auf jedem Modell lässt sich deine Marke ganz einfach sichtbar machen, ob auf der Flasche, am Verschluss oder auf der Schutzhülle.</p>
			<p class="gvb-branding__text">Für jede unserer Flaschen finden wir die passende Art des Brandings. Vom hochwertigen Digitaldruck bis zur edlen Gravur sorgen wir dafür, dass dein Branding genau dort wirkt, wo es gesehen werden soll. Du wählst die Flasche und wir finden die passende Lösung für dich.</p>
			<a href="#" class="gvb-btn-primary">Mehr erfahren</a>
		</div>

	</div>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
