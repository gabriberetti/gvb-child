<?php
/**
 * Title: Flaschen Cards
 * Slug: gvb/flaschen-cards
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-flaschen-cards">
	<ul class="gvb-flaschen-cards__list">

		<li class="gvb-flaschen-cards__item">
			<div class="gvb-flaschen-cards__image">
				<img src="<?php echo esc_url( $img . '/flaschen-edelstahl.png' ); ?>" alt="Edelstahl Trinkflasche" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Edelstahl</h5>
				<p class="gvb-flaschen-cards__desc">Entdecke unseren widerstandsfähigen Allrounder aus hochwertigem und lebensmittelechtem Edelstahl.</p>
				<a href="<?php echo esc_url( home_url( '/edelstahl/' ) ); ?>" class="gvb-btn-primary">Mehr erfahren</a>
			</div>
		</li>

		<li class="gvb-flaschen-cards__item">
			<div class="gvb-flaschen-cards__image">
				<img src="<?php echo esc_url( $img . '/flaschen-tritan.png' ); ?>" alt="Tritan Trinkflasche" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Tritan</h5>
				<p class="gvb-flaschen-cards__desc">Unsere Tritanflaschen sind BPA- und Mikroplastikfrei und für jeden Einsatz bestens geeignet.</p>
				<a href="<?php echo esc_url( home_url( '/tritan/' ) ); ?>" class="gvb-btn-primary">Mehr erfahren</a>
			</div>
		</li>

		<li class="gvb-flaschen-cards__item">
			<div class="gvb-flaschen-cards__image">
				<img src="<?php echo esc_url( $img . '/flaschen-borosilikat.png' ); ?>" alt="Borosilikatglas Trinkflasche" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Borosilikatglas</h5>
				<p class="gvb-flaschen-cards__desc">Unsere edlen Glasflaschen gibt es in vielen verschiedenen Modellen und mit unterschiedlichen Verschlüssen.</p>
				<a href="<?php echo esc_url( home_url( '/borosilikatglas/' ) ); ?>" class="gvb-btn-primary">Mehr erfahren</a>
			</div>
		</li>

	</ul>
</section>
<!-- /wp:html -->
