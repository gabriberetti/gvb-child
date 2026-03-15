<?php
/**
 * Good Vibe Bottles Child Theme — functions.php
 * Enqueue parent + child styles only. Everything else added per phase.
 */

function gvb_enqueue_styles() {
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style(
        'child-style',
        get_stylesheet_uri(),
        array( 'parent-style' ),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'gvb_enqueue_styles' );
