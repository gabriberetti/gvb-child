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

    /* Language soft-redirect (Option B — non-DE-browser visitors → EN
       on first visit). Loaded in <head> (the `false` 5th arg) so the
       redirect fires before content paints, avoiding a flash of DE
       before jumping to EN. The DE → EN URL map below comes from
       gvb_page_pair_map() — one source of truth across PHP + JS. */
    wp_enqueue_script(
        'gvb-lang-redirect',
        $theme_uri . '/assets/js/lang-redirect.js',
        array(),
        filemtime( $theme_dir . '/assets/js/lang-redirect.js' ),
        false
    );

    if ( function_exists( 'gvb_page_pair_map' ) ) {
        $pair_map = gvb_page_pair_map();
        $js_map   = array(
            // DE front page → EN home.
            '/' => '/en/',
        );
        foreach ( $pair_map as $de_slug => $en_slug ) {
            $js_map[ '/' . $de_slug ] = '/en/' . $en_slug . '/';
        }
        wp_add_inline_script(
            'gvb-lang-redirect',
            'window.GVB_LANG_MAP = ' . wp_json_encode( $js_map ) . ';',
            'before'
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
        'gvb/category-hero'         => array( 'file' => 'category-hero.php',         'title' => 'Category Hero' ),
        'gvb/category-all-articles' => array( 'file' => 'category-all-articles.php', 'title' => 'Category All Articles' ),
        'gvb/impressum-hero'    => array( 'file' => 'impressum-hero.php',    'title' => 'Impressum Hero' ),
        'gvb/impressum-content' => array( 'file' => 'impressum-content.php', 'title' => 'Impressum Content' ),
        'gvb/datenschutz-hero'    => array( 'file' => 'datenschutz-hero.php',    'title' => 'Datenschutz Hero' ),
        'gvb/datenschutz-content' => array( 'file' => 'datenschutz-content.php', 'title' => 'Datenschutz Content' ),
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

    // Auto-register English mirror patterns from patterns/en/
    // Slug derived from filename: patterns/en/edelstahl-hero.php → gvb/en-edelstahl-hero
    // Title pulled from each file's "Title:" docblock when present.
    $en_dir = get_stylesheet_directory() . '/patterns/en/';
    if ( is_dir( $en_dir ) ) {
        foreach ( glob( $en_dir . '*.php' ) as $en_file ) {
            $slug_base = basename( $en_file, '.php' );
            $en_slug   = 'gvb/en-' . $slug_base;
            if ( $registry->is_registered( $en_slug ) ) {
                continue;
            }

            // Extract Title from file's leading docblock
            $header = file_get_contents( $en_file, false, null, 0, 512 );
            if ( $header && preg_match( '/Title:\s*(.+)$/m', $header, $m ) ) {
                $title = trim( $m[1] );
            } else {
                $title = 'EN ' . ucwords( str_replace( array( '-', '_' ), ' ', $slug_base ) );
            }

            ob_start();
            include $en_file;
            $content = ob_get_clean();
            register_block_pattern( $en_slug, array(
                'title'      => $title,
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
        'gvb-header-nav'    => __( 'Header Navigation (DE)', 'gvb' ),
        'gvb-header-nav-en' => __( 'Header Navigation (EN)', 'gvb' ),
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

/* ── 9. English page detection helper ────────────────────────── */

/**
 * Determine whether a given post is part of the English-language section.
 *
 * Returns true when:
 *   - The post is an `en_post` (English blog post CPT), OR
 *   - The post is a page that is itself slug=`en` or has an ancestor with slug=`en`
 *     (i.e. lives under /en/).
 *
 * Used by hreflang injection, the `language_attributes` filter, og:locale
 * meta tags, and the language switcher pattern.
 *
 * @param int|null $post_id Optional. Defaults to the queried object.
 * @return bool
 */
function gvb_is_english_page( $post_id = null ) {
    if ( null === $post_id ) {
        $post_id = get_queried_object_id();
    }
    if ( ! $post_id ) {
        return false;
    }

    $post_type = get_post_type( $post_id );

    // English blog posts (custom post type)
    if ( 'en_post' === $post_type ) {
        return true;
    }

    // English pages — self or ancestor has slug `en`
    if ( 'page' === $post_type ) {
        $candidates   = get_post_ancestors( $post_id );
        $candidates[] = (int) $post_id; // include self in case this IS the /en/ parent
        foreach ( $candidates as $candidate_id ) {
            if ( 'en' === get_post_field( 'post_name', $candidate_id ) ) {
                return true;
            }
        }
    }

    return false;
}

/* ── 10. English Posts CPT + en_category taxonomy ────────────── */

/**
 * Register the `en_post` custom post type for English blog posts and the
 * `en_category` taxonomy that mirrors the German `category` taxonomy.
 *
 * URL structure:
 *   - Archive:  /en/blog/
 *   - Single:   /en/blog/{slug}/
 *   - Category: /en/blog/category/{slug}/
 *
 * NOTE: After deploying, visit Settings → Permalinks once (or call
 * flush_rewrite_rules()) to register the rewrite rules. Visiting the
 * Permalinks screen is sufficient — no field needs to change.
 */
function gvb_register_en_post_type() {
    register_post_type( 'en_post', array(
        'labels' => array(
            'name'               => __( 'English Posts', 'gvb' ),
            'singular_name'      => __( 'English Post', 'gvb' ),
            'menu_name'          => __( 'English Posts', 'gvb' ),
            'add_new'            => __( 'Add New', 'gvb' ),
            'add_new_item'       => __( 'Add New English Post', 'gvb' ),
            'edit_item'          => __( 'Edit English Post', 'gvb' ),
            'new_item'           => __( 'New English Post', 'gvb' ),
            'view_item'          => __( 'View English Post', 'gvb' ),
            'search_items'       => __( 'Search English Posts', 'gvb' ),
            'not_found'          => __( 'No English posts found', 'gvb' ),
            'not_found_in_trash' => __( 'No English posts found in Trash', 'gvb' ),
            'all_items'          => __( 'All English Posts', 'gvb' ),
        ),
        'public'        => true,
        'show_in_rest'  => true,
        'has_archive'   => 'en/blog',
        'rewrite'       => array( 'slug' => 'en/blog', 'with_front' => false ),
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'author', 'revisions' ),
        'menu_icon'     => 'dashicons-admin-site-alt3',
        'menu_position' => 6, // Between Posts (5) and Pages (20)
    ) );

    register_taxonomy( 'en_category', 'en_post', array(
        'labels' => array(
            'name'          => __( 'English Categories', 'gvb' ),
            'singular_name' => __( 'English Category', 'gvb' ),
            'menu_name'     => __( 'Categories', 'gvb' ),
        ),
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'en/blog/category', 'with_front' => false ),
    ) );
}
add_action( 'init', 'gvb_register_en_post_type' );

/**
 * Reorder rewrite rules so `en_category` archive URLs match before
 * the `en_post` attachment rule.
 *
 * Why: registering en_post with slug 'en/blog' auto-creates an
 * attachment rule `en/blog/[^/]+/([^/]+)/?$` that matches
 * `/en/blog/category/{slug}/` first (interpreting it as
 * attachment '{slug}' inside post 'category') → 404 on every
 * EN category archive.
 *
 * Solution: hoist all rules whose query string contains
 * `en_category=` to the top of the rules array so they're
 * evaluated before the broader en_post pattern. URLs unchanged;
 * only evaluation order changes.
 *
 * After deploying, run `wp rewrite flush` (or visit
 * Settings → Permalinks) once to commit the new ordering to
 * the .htaccess / rewrite cache.
 */
function gvb_reorder_en_category_rules( $rules ) {
    if ( ! is_array( $rules ) ) {
        return $rules;
    }
    $en_category_rules = array();
    $other_rules       = array();
    foreach ( $rules as $regex => $query ) {
        if ( is_string( $query ) && strpos( $query, 'en_category=' ) !== false ) {
            $en_category_rules[ $regex ] = $query;
        } else {
            $other_rules[ $regex ] = $query;
        }
    }
    return array_merge( $en_category_rules, $other_rules );
}
add_filter( 'rewrite_rules_array', 'gvb_reorder_en_category_rules', 99 );

/**
 * Inject `is_featured = 1` meta_query into the EN blog featured-zone Query Loop.
 *
 * WordPress's built-in sticky_posts feature is hardcoded to the `post` post
 * type, so `"sticky":"only"` on a Query Loop with postType=en_post returns
 * nothing. We replace it with an ACF boolean field `is_featured` (defined in
 * acf-json/group_en_post_featured.json) and inject the meta_query here when
 * the rendered Query Loop block carries the `gvb-blog-featured__query` class.
 *
 * Identification: the EN featured pattern (patterns/en/blog-featured.php) sets
 * `className: "gvb-blog-featured__query"` on its <!-- wp:query --> block. The
 * other Query Loops on the EN blog (all-articles, category-archive) use
 * different classNames so they're unaffected.
 *
 * @param array     $query_args Default query arguments built by Query Loop block.
 * @param \WP_Block $block      The block instance — we read parsed_block attrs from it.
 * @return array Possibly-modified query arguments.
 */
function gvb_filter_en_blog_featured_query( $query_args, $block ) {
    if ( ! isset( $block->parsed_block['attrs']['className'] ) ) {
        return $query_args;
    }
    $class = (string) $block->parsed_block['attrs']['className'];
    if ( false === strpos( $class, 'gvb-blog-featured__query' ) ) {
        return $query_args;
    }

    // Drop the no-op sticky filter (CPTs don't support sticky_posts).
    if ( isset( $query_args['post__in'] ) ) {
        unset( $query_args['post__in'] );
    }

    // Filter to en_post entries with is_featured = 1 (set via ACF True/False
    // field in the post sidebar).
    $query_args['meta_query'] = array(
        array(
            'key'     => 'is_featured',
            'value'   => '1',
            'compare' => '=',
        ),
    );

    return $query_args;
}
add_filter( 'query_loop_block_query_vars', 'gvb_filter_en_blog_featured_query', 10, 2 );

/* ── 8.5. Translation pairing — pages (hardcoded), posts (ACF) ─── */

/**
 * Hardcoded DE → EN page slug map.
 *
 * The 17 static pages are paired here in code rather than via ACF because
 * they're a fixed, known set that essentially never changes. This keeps
 * the pairings self-documenting in the codebase, removes the 15-min admin
 * task of clicking pairings into each page, and ships via git so they're
 * version-controlled with the rest of the EN setup.
 *
 * Format: [ DE_post_name (slug) => EN_post_name (slug under /en/ parent) ]
 *
 * Front-page special case: not in this array. Detected via
 * get_option('page_on_front'); its EN counterpart is the page with slug
 * 'en' that hosts the EN home. See gvb_get_page_pair_id() for the logic.
 *
 * If a slug ever changes, edit this array and git push — no admin work.
 *
 * Blog posts (DE `post` ↔ EN `en_post`) use the ACF Translation Pairing
 * field instead of this map — see gvb_counterpart_url() below.
 */
function gvb_page_pair_map() {
    return array(
        'unsere-flaschen'         => 'our-bottles',
        'edelstahl'               => 'stainless-steel',
        'borosilikatglas'         => 'borosilicate-glass',
        'tritan'                  => 'tritan',
        'unsere-losungen'         => 'solutions',
        'uber-uns'                => 'about',
        'bedrucken'               => 'printing',
        'unternehmen'             => 'corporate',
        'sportvereine'            => 'sports-clubs',
        'gesundheitswesen'        => 'healthcare',
        'hotel-wellness-und-spa'  => 'hotel-wellness-spa',
        'bildungseinrichtungen'   => 'education',
        'faq'                     => 'faq',
        'download'                => 'downloads',
        'impressum'               => 'imprint',
        'datenschutz'             => 'privacy',
    );
}

/**
 * Look up a page's counterpart ID using the hardcoded slug map.
 *
 * Handles three cases:
 *   1. DE front page  → EN home page (slug 'en')
 *   2. EN home (slug 'en') → DE front page (whatever Settings → Reading says)
 *   3. Any other DE/EN page → reverse/forward lookup in gvb_page_pair_map()
 *
 * @param int  $post_id Page ID.
 * @param bool $is_en   Whether $post_id is the English-side page.
 * @return int Counterpart page ID, or 0 if not resolvable.
 */
function gvb_get_page_pair_id( $post_id, $is_en ) {
    // DE front page → EN home (page with slug 'en')
    if ( ! $is_en && (int) $post_id === (int) get_option( 'page_on_front' ) ) {
        $en_home = get_page_by_path( 'en' );
        return $en_home ? (int) $en_home->ID : 0;
    }

    $current_slug = get_post_field( 'post_name', $post_id );
    if ( ! $current_slug ) {
        return 0;
    }

    // EN home (slug 'en') → DE front page
    if ( $is_en && 'en' === $current_slug ) {
        $front_id = (int) get_option( 'page_on_front' );
        return $front_id ?: 0;
    }

    $map = gvb_page_pair_map();

    if ( $is_en ) {
        // EN slug → DE slug (reverse lookup)
        $de_slug = array_search( $current_slug, $map, true );
        if ( false === $de_slug ) {
            return 0;
        }
        $de_page = get_page_by_path( $de_slug );
        return $de_page ? (int) $de_page->ID : 0;
    }

    // DE slug → EN page (lives at /en/{en_slug})
    if ( ! isset( $map[ $current_slug ] ) ) {
        return 0;
    }
    $en_page = get_page_by_path( 'en/' . $map[ $current_slug ] );
    return $en_page ? (int) $en_page->ID : 0;
}

/**
 * Resolve the translation counterpart URL for a given post.
 *
 * Strategy:
 *   - Pages           → hardcoded gvb_page_pair_map() (zero admin work)
 *   - Posts (post/en_post) → ACF Translation Pairing field
 *
 * Returns empty string if no counterpart can be resolved. Callers should
 * fall back to the language home root (`/` or `/en/`) for graceful UX.
 *
 * @param int|null $post_id Optional. Defaults to the queried object.
 * @return string Counterpart URL, or '' if not resolvable.
 */
function gvb_counterpart_url( $post_id = null ) {
    if ( null === $post_id ) {
        $post_id = get_queried_object_id();
    }
    if ( ! $post_id ) {
        return '';
    }

    $is_en     = gvb_is_english_page( $post_id );
    $post_type = get_post_type( $post_id );

    if ( 'page' === $post_type ) {
        $pair_id = gvb_get_page_pair_id( $post_id, $is_en );
        return ( $pair_id && 'publish' === get_post_status( $pair_id ) )
            ? get_permalink( $pair_id )
            : '';
    }

    if ( in_array( $post_type, array( 'post', 'en_post' ), true ) && function_exists( 'get_field' ) ) {
        $pair_id = $is_en
            ? gvb_acf_to_post_id( get_field( '_de_page_id', $post_id ) )
            : gvb_acf_to_post_id( get_field( '_en_page_id', $post_id ) );
        return ( $pair_id && 'publish' === get_post_status( $pair_id ) )
            ? get_permalink( $pair_id )
            : '';
    }

    return '';
}

/**
 * Normalize an ACF Post Object field value to an integer post ID.
 *
 * ACF Post Object fields can return either an integer (when "Return Format"
 * is set to "Post ID") or a WP_Post object (when set to "Post Object").
 * This helper accepts both shapes plus arrays for multi-select variants.
 *
 * @param mixed $value Raw return value from get_field().
 * @return int Post ID, or 0 if invalid/empty.
 */
function gvb_acf_to_post_id( $value ) {
    if ( empty( $value ) ) {
        return 0;
    }
    if ( is_object( $value ) && isset( $value->ID ) ) {
        return (int) $value->ID;
    }
    if ( is_array( $value ) ) {
        $first = reset( $value );
        return is_object( $first ) ? (int) $first->ID : (int) $first;
    }
    return (int) $value;
}

/* ── 9. SEO: hreflang + language_attributes + og:locale ──────── */

/**
 * Output reciprocal hreflang link tags in the document <head>.
 *
 * Tags emitted (when applicable):
 *   <link rel="alternate" hreflang="de-DE"    href="..." />
 *   <link rel="alternate" hreflang="x-default" href="..." /> (mirrors DE — primary market)
 *   <link rel="alternate" hreflang="en"       href="..." />
 *
 * Counterpart resolution lives in gvb_counterpart_url():
 *   - Pages → hardcoded slug map (no admin work needed)
 *   - Posts → ACF Translation Pairing field (filled per-post by editor)
 *
 * If the counterpart is missing/unpublished, only the self-referencing tag
 * is emitted (graceful degradation — no broken hreflang cluster).
 *
 * Skips on archive/search/404; only fires for is_singular() and the static
 * front page.
 */
function gvb_hreflang_tags() {
    if ( ! is_singular() && ! is_front_page() ) {
        return;
    }

    $current_id = get_queried_object_id();
    if ( ! $current_id ) {
        return; // "latest posts" homepage with no static page assigned — skip.
    }

    $is_en    = gvb_is_english_page( $current_id );
    $self_url = get_permalink( $current_id );
    $pair_url = gvb_counterpart_url( $current_id );

    $de_url = $is_en ? $pair_url : $self_url;
    $en_url = $is_en ? $self_url : $pair_url;

    if ( $de_url ) {
        printf( '<link rel="alternate" hreflang="de-DE" href="%s" />' . "\n", esc_url( $de_url ) );
        printf( '<link rel="alternate" hreflang="x-default" href="%s" />' . "\n", esc_url( $de_url ) );
    }
    if ( $en_url ) {
        printf( '<link rel="alternate" hreflang="en" href="%s" />' . "\n", esc_url( $en_url ) );
    }
}
add_action( 'wp_head', 'gvb_hreflang_tags', 5 );

/**
 * Set HTML lang attribute to "en-US" on English pages.
 *
 * Falls through to the WordPress default ("de-DE" per Settings → General)
 * for everything else, so DE pages remain unchanged.
 *
 * @param string $output Default `lang="..." dir="..."` attribute string.
 * @return string
 */
function gvb_language_attributes( $output ) {
    if ( gvb_is_english_page( get_queried_object_id() ) ) {
        return 'lang="en-US" dir="ltr"';
    }
    return $output;
}
add_filter( 'language_attributes', 'gvb_language_attributes' );

/**
 * Emit OpenGraph og:locale + og:locale:alternate per language.
 *
 * Ensures social shares (Facebook, LinkedIn, etc.) advertise the correct
 * primary locale and the available translation.
 *
 * NOTE: RankMath also emits og:locale (default priority 10). We hook at
 * priority 6 so our tag appears first; OG parsers typically honour the first
 * occurrence. If duplicate tags become an issue in QA, filter
 * `rank_math/frontend/locale` to return our locale and remove this emit.
 */
function gvb_og_locale() {
    $is_en   = gvb_is_english_page( get_queried_object_id() );
    $primary = $is_en ? 'en_US' : 'de_DE';
    $alt     = $is_en ? 'de_DE' : 'en_US';
    printf( '<meta property="og:locale" content="%s" />' . "\n", esc_attr( $primary ) );
    printf( '<meta property="og:locale:alternate" content="%s" />' . "\n", esc_attr( $alt ) );
}
add_action( 'wp_head', 'gvb_og_locale', 6 );

/* ── 10. Language switcher shortcode ─────────────────────────── */

/**
 * Render the DE / EN language switcher.
 *
 * Outputs a small <nav> with two language links. The active link
 * carries `aria-current="page"` and self-references; the inactive link
 * points to the equivalent translated page (resolved via
 * gvb_counterpart_url() — hardcoded map for pages, ACF for posts) or,
 * as fallback, to the language home root (`/` for DE, `/en/` for EN).
 *
 * Both links carry `lang` + `hreflang` attributes so screen readers
 * announce the language correctly and search engines understand the
 * link semantics.
 *
 * Usage in template part / pattern:
 *   <!-- wp:shortcode -->[gvb_lang_switcher]<!-- /wp:shortcode -->
 *
 * Usage in PHP:
 *   echo do_shortcode( '[gvb_lang_switcher]' );
 *
 * @return string
 */
function gvb_lang_switcher_shortcode() {
    $current_id = get_queried_object_id();
    $is_en      = gvb_is_english_page( $current_id );

    $pair_url = $current_id ? gvb_counterpart_url( $current_id ) : '';
    if ( ! $pair_url ) {
        $pair_url = $is_en ? home_url( '/' ) : home_url( '/en/' );
    }

    // Self URL for the active link (matches canonical — no surprise reload target)
    $self_url = $current_id ? get_permalink( $current_id ) : ( $is_en ? home_url( '/en/' ) : home_url( '/' ) );

    $de_href   = $is_en ? $pair_url : $self_url;
    $en_href   = $is_en ? $self_url : $pair_url;
    $de_class  = $is_en ? 'gvb-lang-switcher__link' : 'gvb-lang-switcher__link is-active';
    $en_class  = $is_en ? 'gvb-lang-switcher__link is-active' : 'gvb-lang-switcher__link';
    $de_aria   = $is_en ? '' : ' aria-current="page"';
    $en_aria   = $is_en ? ' aria-current="page"' : '';

    return sprintf(
        '<nav class="gvb-lang-switcher" aria-label="%s">' .
        '<a class="%s" href="%s" lang="de" hreflang="de-DE"%s>DE</a>' .
        '<span class="gvb-lang-switcher__divider" aria-hidden="true">/</span>' .
        '<a class="%s" href="%s" lang="en" hreflang="en"%s>EN</a>' .
        '</nav>',
        esc_attr__( 'Language', 'gvb' ),
        esc_attr( $de_class ),
        esc_url( $de_href ),
        $de_aria,
        esc_attr( $en_class ),
        esc_url( $en_href ),
        $en_aria
    );
}
add_shortcode( 'gvb_lang_switcher', 'gvb_lang_switcher_shortcode' );

/* ── 11. Site-logo link rewrite on English pages ─────────────── */

/**
 * Rewrite the core/site-logo block's anchor on English pages so the
 * logo links to /en/ instead of the WP home_url() (German homepage).
 *
 * The site-logo block hardcodes home_url() into its rendered <a href>;
 * since we don't run a multilingual plugin, we patch the markup at
 * render time. Only fires on EN pages — DE pages are untouched.
 */
function gvb_site_logo_en_home( $block_content, $block ) {
    if ( empty( $block_content ) || empty( $block['blockName'] ) || $block['blockName'] !== 'core/site-logo' ) {
        return $block_content;
    }
    if ( ! gvb_is_english_page( get_queried_object_id() ) ) {
        return $block_content;
    }
    $en_home = esc_url( home_url( '/en/' ) );
    return preg_replace(
        '/(<a\b[^>]*\bhref=)(["\'])[^"\']*\2/i',
        '$1$2' . $en_home . '$2',
        $block_content,
        1
    );
}
add_filter( 'render_block', 'gvb_site_logo_en_home', 10, 2 );

/* ── 12. Frontend locale switch for /en/ pages ───────────────── */

/**
 * Override the WordPress locale to en_US on EN frontend requests.
 *
 * Borlabs Cookie (Professional plan) and other locale-aware plugins
 * read get_locale() to decide which language tier to serve. Without
 * a multilingual plugin (WPML/Polylang/TranslatePress), Borlabs
 * falls back to get_locale() — so on /en/ pages we make WP itself
 * return en_US, and Borlabs picks up the English consent dialog.
 *
 * Scope:
 *   - Frontend only (admin stays de_DE for WP UI; REST stays de_DE
 *     so admin/REST flows aren't affected).
 *   - URL-based check on REQUEST_URI: filter fires very early, before
 *     query resolution — gvb_is_english_page() needs a post ID and
 *     isn't usable here.
 *
 * Side-effects: any other locale-aware plugin/theme code on /en/
 * frontend requests will also see en_US. For our setup that means:
 *   - RankMath outputs en locale meta tags on EN pages (correct).
 *   - Fluent Forms still uses form ID 5 for EN (independent of locale).
 *   - Theme has no __() calls so no theme-side i18n impact.
 *
 * @param string $locale The locale WP determined.
 * @return string
 */
add_filter( 'locale', function ( $locale ) {
    if ( is_admin() || ( defined( 'REST_REQUEST' ) && REST_REQUEST ) ) {
        return $locale;
    }
    $uri = $_SERVER['REQUEST_URI'] ?? '';
    if ( strpos( $uri, '/en/' ) === 0 || $uri === '/en' ) {
        return 'en_US';
    }
    return $locale;
} );

/* ── 13. Disable Polylang canonical redirect on /en/ URLs ─────── */

/**
 * Skip Polylang's canonical-URL redirect on every /en/* URL.
 *
 * Polylang's directory mode strips the /en/ prefix from the URL
 * before looking up the page by slug. For pages whose slug collides
 * between DE and EN (e.g. both /faq/ and /en/faq/ use slug "faq",
 * both /tritan/ and /en/tritan/ use slug "tritan"), Polylang's
 * non-hierarchical lookup finds the older DE page first, sees a
 * language mismatch, and redirects /en/<slug>/ → /<slug>/.
 *
 * Our EN pages live as a hierarchical tree with post_parent=140
 * (the "en" page) — WordPress's own hierarchical permalink system
 * resolves /en/<slug>/ to the correct EN page. We don't need (and
 * actively conflict with) Polylang's canonical redirect.
 *
 * Returning false from this filter disables Polylang's redirect
 * on the matching request. WP's native routing then takes over and
 * resolves the URL correctly.
 *
 * @see https://polylang.pro/doc/filter-reference/#pll_check_canonical_url
 */
add_filter( 'pll_check_canonical_url', function ( $redirect_url ) {
    $uri = $_SERVER['REQUEST_URI'] ?? '';
    if ( strpos( $uri, '/en/' ) === 0 || $uri === '/en' ) {
        return false;
    }
    return $redirect_url;
}, 10, 1 );

/**
 * Make Polylang's /en/* rewrite use the hierarchical pagename.
 *
 * Polylang registers a rewrite rule:
 *   (en)/(.?.+?)/?$  →  index.php?lang=en&pagename=$matches[2]
 *
 * On a URL like /en/faq/ that resolves to query vars
 * `lang=en, pagename=faq`. WP then looks up the page with slug "faq"
 * non-hierarchically — finds the older DE page (ID 66) before our
 * EN page (ID 171), serves the wrong post.
 *
 * Our EN pages live under post_parent=140 (the "en" page), so their
 * hierarchical pagename is `en/<slug>` not just `<slug>`. Prepend
 * "en/" here so the lookup is hierarchical and resolves to the EN
 * page directly. WP's get_page_by_path() handles hierarchical
 * pagenames correctly — only the non-hierarchical lookup was broken.
 *
 * Skip if pagename already includes a slash (already hierarchical),
 * or starts with 'en/' (already prefixed by some other path).
 */
add_filter( 'request', function ( $vars ) {
    if (
        ! empty( $vars['lang'] )
        && $vars['lang'] === 'en'
        && ! empty( $vars['pagename'] )
        && strpos( $vars['pagename'], '/' ) === false
    ) {
        $vars['pagename'] = 'en/' . $vars['pagename'];
    }
    return $vars;
} );

/**
 * Add a slug-based class to body — `.page-{slug}` — on every page.
 *
 * WP core's body_class() emits `.page-id-X` (env-specific) and
 * `.page-template-{file}` but no slug class for `page` post types.
 * This makes scoped CSS like `.page-faq .gvb-brand-promise { … }`
 * portable between Local and prod where IDs differ.
 *
 * For EN pages (under parent `en`) we also add the parent-slug class
 * (`.page-faq` AND `.page-en-faq` on /en/faq/) so a single rule can
 * target either or both.
 */
function gvb_body_class_slug( $classes ) {
    if ( ! is_singular() ) {
        return $classes;
    }
    $post = get_queried_object();
    if ( ! $post || empty( $post->post_name ) ) {
        return $classes;
    }
    $slug = sanitize_html_class( $post->post_name );
    if ( $slug && ! in_array( 'page-' . $slug, $classes, true ) ) {
        $classes[] = 'page-' . $slug;
    }
    if ( $post->post_parent ) {
        $parent = get_post( $post->post_parent );
        if ( $parent && $parent->post_name ) {
            $compound = sanitize_html_class( $parent->post_name . '-' . $post->post_name );
            if ( $compound && ! in_array( 'page-' . $compound, $classes, true ) ) {
                $classes[] = 'page-' . $compound;
            }
        }
    }
    return $classes;
}
add_filter( 'body_class', 'gvb_body_class_slug' );
