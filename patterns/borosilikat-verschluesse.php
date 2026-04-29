<?php
/**
 * Title: Borosilikatglas Verschlüsse
 * Slug: gvb/borosilikat-verschluesse
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-borosilikat-verschluesse">

	<h3 class="gvb-borosilikat-verschluesse__heading">Unsere Verschlüsse.</h3>

	<div class="gvb-borosilikat-verschluesse__cards">

		<div class="gvb-verschluss-col">
			<div class="gvb-verschluss-card">
				<div class="gvb-verschluss-card__image">
					<img src="<?php echo esc_url( $img . '/borosilikat-verschluss-bambus.webp' ); ?>" alt="Bambusverschluss Slim" />
				</div>
			</div>
			<h5 class="gvb-verschluss-card__title">Bambus</h5>
			<p class="gvb-verschluss-card__desc">Bambusverschluss in edler Optik.</p>
		</div>

		<div class="gvb-verschluss-col">
			<div class="gvb-verschluss-card">
				<div class="gvb-verschluss-card__image">
					<img src="<?php echo esc_url( $img . '/borosilikat-verschluss-bambus-wideneck.webp' ); ?>" alt="Bambusverschluss Wideneck" />
				</div>
			</div>
			<h5 class="gvb-verschluss-card__title">Bambus Wideneck</h5>
		</div>

		<div class="gvb-verschluss-col">
			<div class="gvb-verschluss-card">
				<div class="gvb-verschluss-card__image">
					<img src="<?php echo esc_url( $img . '/borosilikat-verschluss-edelstahl.webp' ); ?>" alt="Edelstahlverschluss Slim" />
				</div>
			</div>
			<h5 class="gvb-verschluss-card__title">Edelstahl</h5>
			<p class="gvb-verschluss-card__desc">Hochwertiger Edelstahlverschluss.</p>
		</div>

		<div class="gvb-verschluss-col">
			<div class="gvb-verschluss-card">
				<div class="gvb-verschluss-card__image">
					<img src="<?php echo esc_url( $img . '/borosilikat-verschluss-edelstahl-wideneck.webp' ); ?>" alt="Edelstahlverschluss Wideneck" />
				</div>
			</div>
			<h5 class="gvb-verschluss-card__title">Edelstahl Wideneck</h5>
		</div>

	</div>

</section>
<!-- /wp:html -->
