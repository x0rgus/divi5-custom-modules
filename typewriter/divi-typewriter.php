<?php
/**
 * Plugin Name: Divi Typewriter Module (Divi 5)
 * Description: Simple typewriter text module for Divi 5.
 * Version: 0.1
 * Author: Lucas Procópio (lucas.pr1@hotmail.com)
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function divi_typewriter_register_extension() {

    if ( ! class_exists( 'ET_Builder_Module' ) ) {
        return;
    }

    require_once plugin_dir_path( __FILE__ ) . 'modules/Typewriter/Typewriter.php';

    $typewriter_module = new Divi_Typewriter();

    if ( function_exists( 'et_builder_register_module' ) ) {
        et_builder_register_module( $typewriter_module );
    }

}
add_action( 'et_builder_ready', 'divi_typewriter_register_extension' );

/**
 * Enqueue Visual Builder scripts for Divi 5.
 */
function divi_typewriter_vb_scripts() {

    if ( ! function_exists( 'et_is_builder_plugin_active' ) ) {
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
add_action( 'wp_enqueue_scripts', 'divi_typewriter_vb_scripts' );

