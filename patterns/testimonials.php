<?php
/**
 * Title: Testimonials
 * Slug: gvb/testimonials
 * Categories: gvb
 */
$svg = get_stylesheet_directory_uri() . '/assets/svg';
?>

<!-- wp:group {"className":"gvb-testimonials","style":{"spacing":{"padding":{"top":"120px","bottom":"64px","left":"52px","right":"52px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group gvb-testimonials" style="padding-top:120px;padding-bottom:64px;padding-left:52px;padding-right:52px">

	<!-- wp:group {"className":"gvb-testimonials__header gvb-fade-up","style":{"spacing":{"margin":{"bottom":"48px"}}},"layout":{"type":"default"}} -->
	<div class="wp-block-group gvb-testimonials__header gvb-fade-up" style="margin-bottom:48px">

		<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"clamp(40px, 2.778vw, 71px)","fontWeight":"700","lineHeight":"1.08","letterSpacing":"0.2px"}},"textColor":"gvb-graphite"} -->
		<h2 class="wp-block-heading has-gvb-graphite-color has-text-color" style="font-size:clamp(40px, 2.778vw, 71px);font-weight:700;line-height:1.08;letter-spacing:0.2px">Good Vibe Bottles kommt an.</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"clamp(32px, 2.222vw, 57px)","lineHeight":"1.15","letterSpacing":"0.16px"}},"textColor":"gvb-graphite"} -->
		<p class="has-gvb-graphite-color has-text-color" style="font-size:clamp(32px, 2.222vw, 57px);line-height:1.15;letter-spacing:0.16px">Das sagen unsere Kunden</p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"gvb-testimonials__cards","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group gvb-testimonials__cards">

		<div class="gvb-testimonial-card gvb-fade-up">
			<div class="gvb-testimonial-card__stars">
				<?php for ( $i = 0; $i < 5; $i++ ) : ?>
					<img src="<?php echo esc_url( $svg . '/star.svg' ); ?>" alt="" width="21" height="20" />
				<?php endfor; ?>
			</div>
			<p class="gvb-testimonial-card__quote">&ldquo;Immer gut hydriert, egal wo ich bin.&rdquo;</p>
			<p class="gvb-testimonial-card__name">Andi Antennae</p>
			<p class="gvb-testimonial-card__role">Transport at Suite Nectar</p>
		</div>

		<div class="gvb-testimonial-card gvb-fade-up">
			<div class="gvb-testimonial-card__stars">
				<?php for ( $i = 0; $i < 5; $i++ ) : ?>
					<img src="<?php echo esc_url( $svg . '/star.svg' ); ?>" alt="" width="21" height="20" />
				<?php endfor; ?>
			</div>
			<p class="gvb-testimonial-card__quote">&ldquo;Nachhaltige Trinkflaschen&rdquo; für meine Mitarbeiter:innen. Good Vibes ideed.</p>
			<p class="gvb-testimonial-card__name">Wanda Wingleton</p>
			<p class="gvb-testimonial-card__role">Lepidopterist at Butterflai</p>
		</div>

		<div class="gvb-testimonial-card gvb-fade-up">
			<div class="gvb-testimonial-card__stars">
				<?php for ( $i = 0; $i < 5; $i++ ) : ?>
					<img src="<?php echo esc_url( $svg . '/star.svg' ); ?>" alt="" width="21" height="20" />
				<?php endfor; ?>
			</div>
			<p class="gvb-testimonial-card__quote">&ldquo;Mit GVB tue ich etwas für mich und für die Umwelt.&rdquo;</p>
			<p class="gvb-testimonial-card__name">Carl Caterpillar</p>
			<p class="gvb-testimonial-card__role">Growth at Cocoon &amp; Co.</p>
		</div>

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
