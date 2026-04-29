<?php
/**
 * Title: Lösungen Branchen
 * Slug: gvb/losungen-branchen
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:group {"className":"gvb-branchen","style":{"spacing":{"padding":{"top":"0","bottom":"40px","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-branchen" style="padding-top:0;padding-bottom:40px">

	<!-- wp:heading {"level":2,"className":"gvb-branchen__heading","style":{"typography":{"fontSize":"40px","fontWeight":"700","lineHeight":"1.08","letterSpacing":"0.2px"}}} -->
	<h2 class="wp-block-heading gvb-branchen__heading gvb-fade-up" style="font-size:40px;font-weight:700;line-height:1.08;letter-spacing:0.2px">Deine Branche. Deine Good Vibes.</h2>
	<!-- /wp:heading -->

	<!-- wp:html -->
	<div class="gvb-industry-grid gvb-industry-grid--left-stacked">

		<div class="gvb-industry-card gvb-fade-up">
				<a class="gvb-industry-card__link" href="<?php echo esc_url( home_url( '/unternehmen/' ) ); ?>" aria-label="Umweltbewusste und nachhaltige Unternehmen">Mehr erfahren</a>
				<img src="<?php echo esc_url( $img . '/losungen-branchen-1.jpg' ); ?>" alt="Umweltbewusste Unternehmen" />
			<div class="gvb-industry-card__overlay"></div>
			<div class="gvb-industry-card__content">
				<h5>Umweltbewusste und nachhaltige Unternehmen</h5>
				<a href="<?php echo esc_url( home_url( '/unternehmen/' ) ); ?>" class="gvb-btn-sm">Mehr erfahren</a>
			</div>
		</div>

		<div class="gvb-industry-card gvb-fade-up">
				<a class="gvb-industry-card__link" href="<?php echo esc_url( home_url( '/sportvereine/' ) ); ?>" aria-label="Veranstaltungen, Sport und Freizeitaktivitäten">Mehr erfahren</a>
				<img src="<?php echo esc_url( $img . '/losungen-branchen-2.jpg' ); ?>" alt="Veranstaltungen und Sport" />
			<div class="gvb-industry-card__overlay"></div>
			<div class="gvb-industry-card__content">
				<h5>Veranstaltungen, Sport und Freizeitaktivitäten</h5>
				<a href="<?php echo esc_url( home_url( '/sportvereine/' ) ); ?>" class="gvb-btn-sm">Mehr erfahren</a>
			</div>
		</div>

		<div class="gvb-industry-card gvb-industry-card--tall gvb-fade-up">
				<a class="gvb-industry-card__link" href="<?php echo esc_url( home_url( '/hotel-wellness-und-spa/' ) ); ?>" aria-label="Hotellerie, Wellness und Spa">Mehr erfahren</a>
				<img src="<?php echo esc_url( $img . '/losungen-branchen-3.jpg' ); ?>" alt="Hotellerie, Wellness und Spa" />
			<div class="gvb-industry-card__overlay"></div>
			<div class="gvb-industry-card__content">
				<h5>Hotellerie, Wellness und Spa</h5>
				<a href="<?php echo esc_url( home_url( '/hotel-wellness-und-spa/' ) ); ?>" class="gvb-btn-sm">Mehr erfahren</a>
			</div>
		</div>

	</div>

	<div class="gvb-industry-grid gvb-industry-grid--two-tall">

		<div class="gvb-industry-card gvb-fade-up">
				<a class="gvb-industry-card__link" href="<?php echo esc_url( home_url( '/gesundheitswesen/' ) ); ?>" aria-label="Gesundheitswesen">Mehr erfahren</a>
				<img src="<?php echo esc_url( $img . '/losungen-branchen-4.jpg' ); ?>" alt="Gesundheitswesen" />
			<div class="gvb-industry-card__overlay"></div>
			<div class="gvb-industry-card__content">
				<h5>Gesundheits<br class="gvb-br-card">wesen</h5>
				<a href="<?php echo esc_url( home_url( '/gesundheitswesen/' ) ); ?>" class="gvb-btn-sm">Mehr erfahren</a>
			</div>
		</div>

		<div class="gvb-industry-card gvb-fade-up">
				<a class="gvb-industry-card__link" href="<?php echo esc_url( home_url( '/bildungseinrichtungen/' ) ); ?>" aria-label="Bildungseinrichtungen">Mehr erfahren</a>
				<img src="<?php echo esc_url( $img . '/losungen-branchen-5.jpg' ); ?>" alt="Bildungseinrichtungen" />
			<div class="gvb-industry-card__overlay"></div>
			<div class="gvb-industry-card__content">
				<h5>Bildungs<br class="gvb-br-card">einrichtungen</h5>
				<a href="<?php echo esc_url( home_url( '/bildungseinrichtungen/' ) ); ?>" class="gvb-btn-sm">Mehr erfahren</a>
			</div>
		</div>

	</div>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
