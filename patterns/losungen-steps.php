<?php
/**
 * Title: Lösungen Steps
 * Slug: gvb/losungen-steps
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-steps">

	<div class="gvb-steps__intro">
		<h2 class="gvb-steps__heading">So kommst du an deine<br>Good Vibe Bottles.</h2>
	</div>

	<div class="gvb-steps__rows">

		<!-- Step 1: content left, image right -->
		<div class="gvb-steps__row gvb-fade-up">
			<div class="gvb-steps__content">
				<span class="gvb-steps__number">1</span>
				<div class="gvb-steps__text">
					<h3>Dein Vibe.<br>Deine Trinkflasche.</h3>
					<p>Je nach Trinkflasche hast du verschiedene Optionen zur Auswahl. Entscheide dich für Material, Modell, Farbe, Volumen und Verschluss und du bist schon fast fertig.</p>
				</div>
			</div>
			<div class="gvb-steps__image">
				<img src="<?php echo esc_url( $img . '/losungen-step-1.jpg' ); ?>" alt="Deine Trinkflasche wählen" />
			</div>
		</div>

		<!-- Step 2: image left, content right -->
		<div class="gvb-steps__row gvb-fade-up">
			<div class="gvb-steps__image">
				<img src="<?php echo esc_url( $img . '/losungen-step-2.jpg' ); ?>" alt="Logo oder Design einsenden" />
			</div>
			<div class="gvb-steps__content">
				<span class="gvb-steps__number">2</span>
				<div class="gvb-steps__text">
					<h3>Schicke uns dein<br>Logo oder Design.</h3>
					<p>Darf es persönlicher sein? Schicke uns dein Logo oder Design via Kontaktformular und wir kümmern uns um die Bedruckung deiner Trinkflasche. Als Experten für verschiedene Druckverfahren, wissen wir genau, welches das richtige für dein Motiv ist.</p>
				</div>
			</div>
		</div>

		<!-- Step 3: content left, image right -->
		<div class="gvb-steps__row gvb-fade-up">
			<div class="gvb-steps__content">
				<span class="gvb-steps__number">3</span>
				<div class="gvb-steps__text">
					<h3>Wir kümmern uns um den Rest.</h3>
					<p>Schon alles abgeschickt? Dann musst du nichts weiter tun, als zu warten. Wir trinken kurz einen Schluck und melden uns dann bei dir.</p>
				</div>
			</div>
			<div class="gvb-steps__image">
				<img src="<?php echo esc_url( $img . '/losungen-step-3.jpg' ); ?>" alt="Wir kümmern uns" />
			</div>
		</div>

	</div>

</section>
<!-- /wp:html -->
