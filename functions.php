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

/* ── 9. SEO: hreflang + language_attributes + og:locale ──────── */

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

/**
 * Output reciprocal hreflang link tags in the document <head>.
 *
 * Tags emitted (when applicable):
 *   <link rel="alternate" hreflang="de-DE"    href="..." />
 *   <link rel="alternate" hreflang="x-default" href="..." /> (mirrors DE — primary market)
 *   <link rel="alternate" hreflang="en"       href="..." />
 *
 * Page pairing comes from ACF fields (Translation Pairing field group):
 *   - On DE pages/posts:  `_en_page_id` → EN counterpart (page or en_post)
 *   - On EN pages/posts:  `_de_page_id` → DE counterpart (page or post)
 *
 * Both fields must use Return Format = Post ID (or Post Object — handled by
 * gvb_acf_to_post_id()). Self-referencing + reciprocal annotation are
 * mandatory per Google's hreflang spec.
 *
 * If ACF is not active or the pair is unset, only the self-referencing tag
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

    $is_en = gvb_is_english_page( $current_id );

    if ( function_exists( 'get_field' ) ) {
        $de_id = $is_en
            ? gvb_acf_to_post_id( get_field( '_de_page_id', $current_id ) )
            : (int) $current_id;
        $en_id = $is_en
            ? (int) $current_id
            : gvb_acf_to_post_id( get_field( '_en_page_id', $current_id ) );
    } else {
        // ACF not active — only self-reference (still valid SEO, just no pair).
        $de_id = $is_en ? 0 : (int) $current_id;
        $en_id = $is_en ? (int) $current_id : 0;
    }

    $de_url = ( $de_id && 'publish' === get_post_status( $de_id ) ) ? get_permalink( $de_id ) : '';
    $en_url = ( $en_id && 'publish' === get_post_status( $en_id ) ) ? get_permalink( $en_id ) : '';

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
 * points to the equivalent translated page (via ACF Translation Pairing
 * fields) or, as fallback, to the language home root (`/` for DE,
 * `/en/` for EN).
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

    // Counterpart URL via ACF pairing
    $pair_id = 0;
    if ( $current_id && function_exists( 'get_field' ) ) {
        $pair_id = $is_en
            ? gvb_acf_to_post_id( get_field( '_de_page_id', $current_id ) )
            : gvb_acf_to_post_id( get_field( '_en_page_id', $current_id ) );
    }

    $pair_url = ( $pair_id && 'publish' === get_post_status( $pair_id ) )
        ? get_permalink( $pair_id )
        : ( $is_en ? home_url( '/' ) : home_url( '/en/' ) );

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
