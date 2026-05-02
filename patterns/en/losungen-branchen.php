<?php
/**
 * Title: EN Solutions Industries Grid
 * Slug: gvb/en-losungen-branchen
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:group {"className":"gvb-branchen","style":{"spacing":{"padding":{"top":"0","bottom":"40px","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-branchen" style="padding-top:0;padding-bottom:40px">

	<!-- wp:heading {"level":2,"className":"gvb-branchen__heading","style":{"typography":{"fontSize":"40px","fontWeight":"700","lineHeight":"1.08","letterSpacing":"0.2px"}}} -->
	<h2 class="wp-block-heading gvb-branchen__heading gvb-fade-up" style="font-size:40px;font-weight:700;line-height:1.08;letter-spacing:0.2px">Your industry. Your good vibes.</h2>
	<!-- /wp:heading -->

	<!-- wp:html -->
	<div class="gvb-industry-grid gvb-industry-grid--left-stacked">

		<div class="gvb-industry-card gvb-fade-up">
				<a class="gvb-industry-card__link" href="<?php echo esc_url( home_url( '/en/corporate/' ) ); ?>" aria-label="Sustainability-minded businesses">Find out more</a>
				<img src="<?php echo esc_url( $img . '/losungen-branchen-1.jpg' ); ?>" alt="Sustainability-minded businesses" />
			<div class="gvb-industry-card__overlay"></div>
			<div class="gvb-industry-card__content">
				<h5>Sustainability-minded businesses</h5>
				<a href="<?php echo esc_url( home_url( '/en/corporate/' ) ); ?>" class="gvb-btn-sm">Find out more</a>
			</div>
		</div>

		<div class="gvb-industry-card gvb-fade-up">
				<a class="gvb-industry-card__link" href="<?php echo esc_url( home_url( '/en/sports-clubs/' ) ); ?>" aria-label="Events, sport clubs and leisure activities">Find out more</a>
				<img src="<?php echo esc_url( $img . '/losungen-branchen-2.jpg' ); ?>" alt="Events and sport" />
			<div class="gvb-industry-card__overlay"></div>
			<div class="gvb-industry-card__content">
				<h5>Events, sport clubs and leisure activities</h5>
				<a href="<?php echo esc_url( home_url( '/en/sports-clubs/' ) ); ?>" class="gvb-btn-sm">Find out more</a>
			</div>
		</div>

		<div class="gvb-industry-card gvb-industry-card--tall gvb-fade-up">
				<a class="gvb-industry-card__link" href="<?php echo esc_url( home_url( '/en/hotel-wellness-spa/' ) ); ?>" aria-label="Hospitality, wellness and spa">Find out more</a>
				<img src="<?php echo esc_url( $img . '/losungen-branchen-3.jpg' ); ?>" alt="Hospitality, wellness and spa" />
			<div class="gvb-industry-card__overlay"></div>
			<div class="gvb-industry-card__content">
				<h5>Hospitality, wellness and spa</h5>
				<a href="<?php echo esc_url( home_url( '/en/hotel-wellness-spa/' ) ); ?>" class="gvb-btn-sm">Find out more</a>
			</div>
		</div>

	</div>

	<div class="gvb-industry-grid gvb-industry-grid--two-tall">

		<div class="gvb-industry-card gvb-fade-up">
				<a class="gvb-industry-card__link" href="<?php echo esc_url( home_url( '/en/healthcare/' ) ); ?>" aria-label="Healthcare">Find out more</a>
				<img src="<?php echo esc_url( $img . '/gesundpersonal.png' ); ?>" alt="Healthcare" />
			<div class="gvb-industry-card__overlay"></div>
			<div class="gvb-industry-card__content">
				<h5>Healthcare</h5>
				<a href="<?php echo esc_url( home_url( '/en/healthcare/' ) ); ?>" class="gvb-btn-sm">Find out more</a>
			</div>
		</div>

		<div class="gvb-industry-card gvb-fade-up">
				<a class="gvb-industry-card__link" href="<?php echo esc_url( home_url( '/en/education/' ) ); ?>" aria-label="Education">Find out more</a>
				<img src="<?php echo esc_url( $img . '/losungen-branchen-5.jpg' ); ?>" alt="Educational institutions" />
			<div class="gvb-industry-card__overlay"></div>
			<div class="gvb-industry-card__content">
				<h5>Education</h5>
				<a href="<?php echo esc_url( home_url( '/en/education/' ) ); ?>" class="gvb-btn-sm">Find out more</a>
			</div>
		</div>

	</div>
	<!-- /wp:html -->

</div>
<!-- /wp:group -->
