<?php
/**
 * Plugin Name: Divi 5 Typewriter Module (Custom)
 * Description: Typewriter text module for Divi 5.
 * Version: 0.1
 * Author: Lucas Procópio (lucas.pr1@hotmail.com).
 * Update URI: false
 */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once plugin_dir_path( __FILE__ ) . 'modules/Typewriter/Typewriter.php';

function divi5_typewriter_enqueue_vb_scripts() {

    if ( ! function_exists( 'et_core_is_fb_enabled' ) || ! et_core_is_fb_enabled() ) {
        return;
    }

    $asset_file = plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

    if ( file_exists( $asset_file ) ) {
        $assets = include $asset_file;
        

        wp_enqueue_script(
            'divi-typewriter-vb-script',
            plugin_dir_url( __FILE__ ) . 'build/index.js',
            $assets['dependencies'],
            $assets['version'],
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'divi5_typewriter_enqueue_vb_scripts' );