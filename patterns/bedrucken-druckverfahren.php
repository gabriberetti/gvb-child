<?php
/**
 * Title: Bedrucken Druckverfahren
 * Slug: gvb/bedrucken-druckverfahren
 * Categories: gvb
 */
$img = get_stylesheet_directory_uri() . '/assets/img';
?>

<!-- wp:html -->
<section class="gvb-druckverfahren">
	<div class="gvb-druckverfahren__header">
		<h2 class="gvb-druckverfahren__heading">Unsere Druckverfahren.</h2>
		<p class="gvb-druckverfahren__intro">Damit dein Logo oder Design auf der Flasche richtig gut aussieht, setzen wir auf hochwertige Druckverfahren und erfahrene Partner. So entsteht ein Ergebnis, das präzise umgesetzt wird, langlebig ist und deine Marke so zeigt, wie du es dir vorstellst. Je nach Motiv, Einsatzbereich und gewünschter Wirkung wählen wir das passende Druckverfahren für dich aus.</p>
	</div>

	<ul class="gvb-flaschen-cards__list gvb-flaschen-cards__list--4">
		<li class="gvb-flaschen-cards__item">
			<div class="gvb-flaschen-cards__image">
				<img src="<?php echo esc_url( $img . '/bedrucken-druck-1.jpg' ); ?>" alt="Digitaldruck" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Digitaldruck</h5>
				<p class="gvb-flaschen-cards__desc">Wenn dein Design viele Farben, feine Details oder Farbverläufe enthält, ist der Digitaldruck die richtige Wahl. Er sorgt für brillante Optik und eine präzise Darstellung deines Logos oder Motivs. Auch Rundumdruck und Personalisierungen mit individuellen Namen sind problemlos möglich.</p>
			</div>
		</li>

		<li class="gvb-flaschen-cards__item">
			<div class="gvb-flaschen-cards__image">
				<img src="<?php echo esc_url( $img . '/bedrucken-druck-2.jpg' ); ?>" alt="Siebdruck" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Siebdruck</h5>
				<p class="gvb-flaschen-cards__desc">Der Siebdruck ist perfekt für klare Designs und kräftige Farbflächen. Er bringt dein Logo sauber und langlebig auf die Flasche und eignet sich besonders für größere Stückzahlen.</p>
			</div>
		</li>

		<li class="gvb-flaschen-cards__item">
			<div class="gvb-flaschen-cards__image">
				<img src="<?php echo esc_url( $img . '/bedrucken-druck-3.jpg' ); ?>" alt="Lasergravur" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Lasergravur</h5>
				<p class="gvb-flaschen-cards__desc">Eine Lasergravur ist eine elegante und dauerhafte Veredelung für deine Edelstahlflaschen. Sie wird direkt in die Oberfläche eingearbeitet und sorgt für eine dezente, hochwertige Optik mit zeitlosem Charakter.</p>
			</div>
		</li>

		<li class="gvb-flaschen-cards__item">
			<div class="gvb-flaschen-cards__image">
				<img src="<?php echo esc_url( $img . '/bedrucken-druck-4.jpg' ); ?>" alt="Noch mehr Branding" />
			</div>
			<div class="gvb-flaschen-cards__text">
				<h5 class="gvb-flaschen-cards__title">Noch mehr Branding</h5>
				<p class="gvb-flaschen-cards__desc">Wir helfen dir dabei, das passende Druckverfahren für dein Motiv und deine Flasche zu finden. Neben den Flaschen selbst können auch Verschlüsse, Schutzhüllen oder Umverpackungen personalisiert werden. So entsteht ein Markenauftritt, der bis ins Detail durchdacht ist.</p>
			</div>
		</li>
	</ul>
</section>
<!-- /wp:html -->
