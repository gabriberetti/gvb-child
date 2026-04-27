<?php
/**
 * Good Vibe Bottles Child Theme — functions.php
 *
 * @package GVB
 */

/* ── 1. Enqueue parent + child styles ────────────────────────── */

function gvb_enqueue_styles() {
    wp_enqueue_style(
        'twentytwentyfive-style',
        get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style(
        'gvb-child-style',
        get_stylesheet_uri(),
        array( 'twentytwentyfive-style' ),
        filemtime( get_stylesheet_directory() . '/style.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'gvb_enqueue_styles' );

/* ── 2. Enqueue Adobe Fonts (Scale Variable) ─────────────────── */

function gvb_enqueue_adobe_fonts() {
    wp_enqueue_style(
        'gvb-adobe-fonts',
        'https://use.typekit.net/ycw7tlm.css',
        array(),
        null
    );
}
add_action( 'wp_enqueue_scripts', 'gvb_enqueue_adobe_fonts' );

/* ── 3. Enqueue front-end scripts ──────────────────────────── */

function gvb_enqueue_scripts() {
    $theme_uri = get_stylesheet_directory_uri();
    $theme_dir = get_stylesheet_directory();

    wp_enqueue_script(
        'gvb-cases-carousel',
        $theme_uri . '/assets/js/cases-carousel.js',
        array(),
        filemtime( $theme_dir . '/assets/js/cases-carousel.js' ),
        true
    );

    wp_enqueue_script(
        'gvb-scroll-animations',
        $theme_uri . '/assets/js/scroll-animations.js',
        array(),
        filemtime( $theme_dir . '/assets/js/scroll-animations.js' ),
        true
    );

    wp_enqueue_script(
        'gvb-carousel',
        $theme_uri . '/assets/js/carousel.js',
        array(),
        filemtime( $theme_dir . '/assets/js/carousel.js' ),
        true
    );

    wp_enqueue_script(
        'gvb-bottle-slider',
        $theme_uri . '/assets/js/bottle-slider.js',
        array(),
        filemtime( $theme_dir . '/assets/js/bottle-slider.js' ),
        true
    );

    wp_enqueue_script(
        'gvb-navbar-scroll',
        $theme_uri . '/assets/js/navbar-scroll.js',
        array(),
        filemtime( $theme_dir . '/assets/js/navbar-scroll.js' ),
        true
    );

    if ( is_home() ) {
        wp_enqueue_script(
            'gvb-blog-pagination',
            $theme_uri . '/assets/js/blog-pagination.js',
            array(),
            filemtime( $theme_dir . '/assets/js/blog-pagination.js' ),
            true
        );
    }

}
add_action( 'wp_enqueue_scripts', 'gvb_enqueue_scripts' );

/* ── 4. Ignore sticky posts in the all-articles Query Loop ──── */
add_filter( 'query_loop_block_query_vars', function( $query ) {
    if ( is_home() && empty( $query['post__in'] ) ) {
        $query['ignore_sticky_posts'] = 1;
    }
    return $query;
} );

/* ── 5. Register block pattern category + explicit patterns ──── */

function gvb_register_pattern_category() {
    register_block_pattern_category( 'gvb', array(
        'label'       => __( 'Good Vibe Bottles', 'gvb' ),
        'description' => __( 'Custom patterns for Good Vibe Bottles.', 'gvb' ),
    ) );

    // Explicitly register patterns that auto-registration can miss
    $explicit_patterns = array(
        'gvb/logos'             => array( 'file' => 'logos.php',             'title' => 'Client Logos' ),
        'gvb/losungen-hero'     => array( 'file' => 'losungen-hero.php',     'title' => 'Lösungen Hero' ),
        'gvb/losungen-intro'    => array( 'file' => 'losungen-intro.php',    'title' => 'Lösungen Intro' ),
        'gvb/losungen-branchen' => array( 'file' => 'losungen-branchen.php', 'title' => 'Lösungen Branchen' ),
        'gvb/losungen-personalisieren' => array( 'file' => 'losungen-personalisieren.php', 'title' => 'Lösungen Personalisieren' ),
        'gvb/losungen-branding' => array( 'file' => 'losungen-branding.php', 'title' => 'Lösungen Branding' ),
        'gvb/losungen-steps'    => array( 'file' => 'losungen-steps.php',    'title' => 'Lösungen Steps' ),
        'gvb/flaschen-hero'          => array( 'file' => 'flaschen-hero.php',          'title' => 'Flaschen Hero' ),
        'gvb/flaschen-intro'         => array( 'file' => 'flaschen-intro.php',         'title' => 'Flaschen Intro' ),
        'gvb/flaschen-cards'         => array( 'file' => 'flaschen-cards.php',         'title' => 'Flaschen Cards' ),
        'gvb/uberuns-hero'           => array( 'file' => 'uberuns-hero.php',           'title' => 'Über uns Hero' ),
        'gvb/uberuns-intro'          => array( 'file' => 'uberuns-intro.php',          'title' => 'Über uns Intro' ),
        'gvb/uberuns-vision-mission' => array( 'file' => 'uberuns-vision-mission.php', 'title' => 'Über uns Vision & Mission' ),
        'gvb/uberuns-team'           => array( 'file' => 'uberuns-team.php',           'title' => 'Über uns Team Photo' ),
        'gvb/uberuns-personen'       => array( 'file' => 'uberuns-personen.php',       'title' => 'Über uns Personen' ),
        'gvb/uberuns-ueberzeugung'   => array( 'file' => 'uberuns-ueberzeugung.php',   'title' => 'Über uns Überzeugung' ),
        'gvb/edelstahl-hero'         => array( 'file' => 'edelstahl-hero.php',         'title' => 'Edelstahl Hero' ),
        'gvb/edelstahl-intro'        => array( 'file' => 'edelstahl-intro.php',        'title' => 'Edelstahl Intro' ),
        'gvb/edelstahl-product'      => array( 'file' => 'edelstahl-product.php',      'title' => 'Edelstahl Product Showcase' ),
        'gvb/edelstahl-features'     => array( 'file' => 'edelstahl-features.php',     'title' => 'Edelstahl Features' ),
        'gvb/flaschen-brand-promise'    => array( 'file' => 'flaschen-brand-promise.php',    'title' => 'Flaschen Brand Promise' ),
        'gvb/borosilikat-hero'          => array( 'file' => 'borosilikat-hero.php',          'title' => 'Borosilikatglas Hero' ),
        'gvb/borosilikat-intro'         => array( 'file' => 'borosilikat-intro.php',         'title' => 'Borosilikatglas Intro' ),
        'gvb/borosilikat-product'       => array( 'file' => 'borosilikat-product.php',       'title' => 'Borosilikatglas Product Showcase' ),
        'gvb/borosilikat-verschluesse'  => array( 'file' => 'borosilikat-verschluesse.php',  'title' => 'Borosilikatglas Verschlüsse' ),
        'gvb/borosilikat-features'      => array( 'file' => 'borosilikat-features.php',      'title' => 'Borosilikatglas Features' ),
        'gvb/tritan-hero'               => array( 'file' => 'tritan-hero.php',               'title' => 'Tritan Hero' ),
        'gvb/tritan-intro'              => array( 'file' => 'tritan-intro.php',              'title' => 'Tritan Intro' ),
        'gvb/tritan-product'            => array( 'file' => 'tritan-product.php',            'title' => 'Tritan Product Showcase' ),
        'gvb/tritan-verschluesse'       => array( 'file' => 'tritan-verschluesse.php',       'title' => 'Tritan Verschlüsse' ),
        'gvb/tritan-features'           => array( 'file' => 'tritan-features.php',           'title' => 'Tritan Features' ),
        'gvb/blog-hero'         => array( 'file' => 'blog-hero.php',         'title' => 'Blog Hero' ),
        'gvb/blog-intro'        => array( 'file' => 'blog-intro.php',        'title' => 'Blog Intro Text' ),
        'gvb/blog-featured'     => array( 'file' => 'blog-featured.php',     'title' => 'Blog Featured Articles' ),
        'gvb/blog-all-articles' => array( 'file' => 'blog-all-articles.php', 'title' => 'Blog All Articles' ),
        'gvb/impressum-hero'    => array( 'file' => 'impressum-hero.php',    'title' => 'Impressum Hero' ),
        'gvb/impressum-content' => array( 'file' => 'impressum-content.php', 'title' => 'Impressum Content' ),
        'gvb/bedrucken-hero'           => array( 'file' => 'bedrucken-hero.php',           'title' => 'Bedrucken Hero' ),
        'gvb/bedrucken-intro'          => array( 'file' => 'bedrucken-intro.php',          'title' => 'Bedrucken Intro' ),
        'gvb/bedrucken-statement'      => array( 'file' => 'bedrucken-statement.php',      'title' => 'Bedrucken Statement' ),
        'gvb/bedrucken-druckverfahren' => array( 'file' => 'bedrucken-druckverfahren.php', 'title' => 'Bedrucken Druckverfahren' ),
        'gvb/bedrucken-anlass'         => array( 'file' => 'bedrucken-anlass.php',         'title' => 'Bedrucken Anlass' ),
        'gvb/bedrucken-warum'          => array( 'file' => 'bedrucken-warum.php',          'title' => 'Bedrucken Warum' ),
        'gvb/industrie-intro-unternehmen'           => array( 'file' => 'industrie-intro-unternehmen.php',           'title' => 'Industrie Intro Unternehmen' ),
        'gvb/industrie-benefits-unternehmen'        => array( 'file' => 'industrie-benefits-unternehmen.php',        'title' => 'Industrie Benefits Unternehmen' ),
        'gvb/industrie-hero-unternehmen'            => array( 'file' => 'industrie-hero-unternehmen.php',            'title' => 'Industrie Hero Unternehmen' ),
        'gvb/industrie-intro-sportvereine'          => array( 'file' => 'industrie-intro-sportvereine.php',          'title' => 'Industrie Intro Sportvereine' ),
        'gvb/industrie-benefits-sportvereine'       => array( 'file' => 'industrie-benefits-sportvereine.php',       'title' => 'Industrie Benefits Sportvereine' ),
        'gvb/industrie-hero-sportvereine'           => array( 'file' => 'industrie-hero-sportvereine.php',           'title' => 'Industrie Hero Sportvereine' ),
        'gvb/industrie-intro-gesundheitswesen'      => array( 'file' => 'industrie-intro-gesundheitswesen.php',      'title' => 'Industrie Intro Gesundheitswesen' ),
        'gvb/industrie-benefits-gesundheitswesen'   => array( 'file' => 'industrie-benefits-gesundheitswesen.php',   'title' => 'Industrie Benefits Gesundheitswesen' ),
        'gvb/industrie-hero-gesundheitswesen'       => array( 'file' => 'industrie-hero-gesundheitswesen.php',       'title' => 'Industrie Hero Gesundheitswesen' ),
        'gvb/industrie-hero-hotel-wellness-und-spa'     => array( 'file' => 'industrie-hero-hotel-wellness-und-spa.php',     'title' => 'Industrie Hero Hotel Wellness und Spa' ),
        'gvb/industrie-intro-hotel-wellness-und-spa'    => array( 'file' => 'industrie-intro-hotel-wellness-und-spa.php',    'title' => 'Industrie Intro Hotel Wellness und Spa' ),
        'gvb/industrie-benefits-hotel-wellness-und-spa' => array( 'file' => 'industrie-benefits-hotel-wellness-und-spa.php', 'title' => 'Industrie Benefits Hotel Wellness und Spa' ),
        'gvb/industrie-hero-bildungseinrichtungen'     => array( 'file' => 'industrie-hero-bildungseinrichtungen.php',     'title' => 'Industrie Hero Bildungseinrichtungen' ),
        'gvb/industrie-intro-bildungseinrichtungen'    => array( 'file' => 'industrie-intro-bildungseinrichtungen.php',    'title' => 'Industrie Intro Bildungseinrichtungen' ),
        'gvb/industrie-benefits-bildungseinrichtungen' => array( 'file' => 'industrie-benefits-bildungseinrichtungen.php', 'title' => 'Industrie Benefits Bildungseinrichtungen' ),
        'gvb/industrie-faq-unternehmen'             => array( 'file' => 'industrie-faq-unternehmen.php',             'title' => 'Industrie FAQ Unternehmen' ),
        'gvb/industrie-faq-sportvereine'            => array( 'file' => 'industrie-faq-sportvereine.php',            'title' => 'Industrie FAQ Sportvereine' ),
        'gvb/industrie-faq-gesundheitswesen'        => array( 'file' => 'industrie-faq-gesundheitswesen.php',        'title' => 'Industrie FAQ Gesundheitswesen' ),
        'gvb/industrie-faq-hotel-wellness-und-spa'  => array( 'file' => 'industrie-faq-hotel-wellness-und-spa.php',  'title' => 'Industrie FAQ Hotel Wellness und Spa' ),
        'gvb/industrie-faq-bildungseinrichtungen'   => array( 'file' => 'industrie-faq-bildungseinrichtungen.php',   'title' => 'Industrie FAQ Bildungseinrichtungen' ),
        'gvb/faq-home'             => array( 'file' => 'faq-home.php',             'title' => 'FAQ Home' ),
        'gvb/faq-unsere-flaschen'  => array( 'file' => 'faq-unsere-flaschen.php',  'title' => 'FAQ Unsere Flaschen' ),
        'gvb/faq-edelstahl'        => array( 'file' => 'faq-edelstahl.php',        'title' => 'FAQ Edelstahl' ),
        'gvb/faq-borosilikatglas'  => array( 'file' => 'faq-borosilikatglas.php',  'title' => 'FAQ Borosilikatglas' ),
        'gvb/faq-tritan'           => array( 'file' => 'faq-tritan.php',           'title' => 'FAQ Tritan' ),
        'gvb/faq-unsere-losungen'  => array( 'file' => 'faq-unsere-losungen.php',  'title' => 'FAQ Unsere Lösungen' ),
        'gvb/faq-uber-uns'         => array( 'file' => 'faq-uber-uns.php',         'title' => 'FAQ Über uns' ),
        'gvb/faq-blog'             => array( 'file' => 'faq-blog.php',             'title' => 'FAQ Blog' ),
        'gvb/faq-bedrucken'        => array( 'file' => 'faq-bedrucken.php',        'title' => 'FAQ Bedrucken' ),
        'gvb/download-hero'        => array( 'file' => 'download-hero.php',        'title' => 'Download Hero' ),
        'gvb/download-cards'       => array( 'file' => 'download-cards.php',       'title' => 'Download Cards' ),
        'gvb/faq-hero'             => array( 'file' => 'faq-hero.php',             'title' => 'FAQ Hero' ),
        'gvb/faq-content'          => array( 'file' => 'faq-content.php',          'title' => 'FAQ Content' ),
    );

    $registry = \WP_Block_Patterns_Registry::get_instance();
    foreach ( $explicit_patterns as $slug => $data ) {
        $file = get_stylesheet_directory() . '/patterns/' . $data['file'];
        if ( file_exists( $file ) && ! $registry->is_registered( $slug ) ) {
            ob_start();
            include $file;
            $content = ob_get_clean();
            register_block_pattern( $slug, array(
                'title'      => __( $data['title'], 'gvb' ),
                'categories' => array( 'gvb' ),
                'content'    => $content,
            ) );
        }
    }
}
add_action( 'init', 'gvb_register_pattern_category' );

/* ── 5. Fallback featured image for blog posts ───────────────── */

function gvb_default_post_thumbnail( $html, $post_id, $thumbnail_id ) {
    if ( empty( $html ) ) {
        $fallback = get_stylesheet_directory_uri() . '/assets/img/fallback-thumb.webp';
        $html     = '<img src="' . esc_url( $fallback ) . '" alt="' . esc_attr( get_the_title( $post_id ) ) . '" class="wp-post-image gvb-fallback-thumb" />';
    }
    return $html;
}
add_filter( 'post_thumbnail_html', 'gvb_default_post_thumbnail', 10, 3 );

/* ── 6. Open Graph / social link preview ─────────────────────── */

function gvb_link_preview_image_url() {
    return get_stylesheet_directory_uri() . '/assets/img/link-preview.jpg';
}

/*
 * RankMath is active: feed it our fallback image via its filters so every
 * page gets a preview even without a custom social image set per-post.
 *
 * Without RankMath: output a minimal but complete OG + Twitter block.
 */
if ( defined( 'RANK_MATH_VERSION' ) ) {

    add_filter( 'rank_math/opengraph/facebook/image', function( $image ) {
        return $image ?: gvb_link_preview_image_url();
    } );

    add_filter( 'rank_math/opengraph/twitter/image', function( $image ) {
        return $image ?: gvb_link_preview_image_url();
    } );

} else {

    add_action( 'wp_head', function() {

        $image_url = gvb_link_preview_image_url();
        $site_name = get_bloginfo( 'name' );
        $title     = wp_get_document_title();
        $desc      = get_bloginfo( 'description' );
        $url       = ( is_ssl() ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        if ( is_singular() ) {
            global $post;
            if ( has_excerpt( $post ) ) {
                $desc = wp_strip_all_tags( get_the_excerpt( $post ) );
            }
            if ( has_post_thumbnail( $post ) ) {
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post ), 'large' );
                if ( $thumb ) {
                    $image_url = $thumb[0];
                }
            }
            $url = get_permalink( $post );
        }

        ?>
<meta property="og:type" content="website" />
<meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>" />
<meta property="og:locale" content="de_DE" />
<meta property="og:url" content="<?php echo esc_url( $url ); ?>" />
<meta property="og:title" content="<?php echo esc_attr( $title ); ?>" />
<meta property="og:description" content="<?php echo esc_attr( $desc ); ?>" />
<meta property="og:image" content="<?php echo esc_url( $image_url ); ?>" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="<?php echo esc_url( $image_url ); ?>" />
        <?php
    }, 5 );

}

/* ── 7. Text domain / i18n ───────────────────────────────────── */

function gvb_theme_setup() {
    load_child_theme_textdomain( 'gvb', get_stylesheet_directory() . '/languages' );

    register_nav_menus( array(
        'gvb-header-nav' => __( 'Header Navigation', 'gvb' ),
    ) );
}
add_action( 'after_setup_theme', 'gvb_theme_setup' );

/* ── 8. Allow print-design file uploads (.eps / .ai / .psd / .tif) ─ */

add_filter( 'upload_mimes', function( $mimes ) {
    $mimes['eps']      = 'application/postscript';
    $mimes['ai']       = 'application/postscript';
    $mimes['psd']      = 'image/vnd.adobe.photoshop';
    $mimes['tif|tiff'] = 'image/tiff';
    return $mimes;
} );

add_filter( 'fluentform/allowed_mimes', function( $mimes ) {
    $mimes['eps']  = 'application/postscript';
    $mimes['ai']   = 'application/postscript';
    $mimes['psd']  = 'image/vnd.adobe.photoshop';
    $mimes['tif']  = 'image/tiff';
    $mimes['tiff'] = 'image/tiff';
    return $mimes;
} );
