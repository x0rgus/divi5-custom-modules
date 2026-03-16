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

add_action( 'divi_visual_builder_assets_before_enqueue_scripts', function() {
    if ( class_exists( '\ET\Builder\VisualBuilder\Assets\PackageBuildManager' ) ) {
        \ET\Builder\VisualBuilder\Assets\PackageBuildManager::register_package_build(
            array(
                'name'    => 'divi-typewriter-vb',
                'version' => '1.0.0',
                'script'  => array(
                    'src'                => plugin_dir_url( __FILE__ ) . 'build/index.js',
                    'deps'               => array( 'divi-module-library', 'divi-vendor-wp-hooks' ),
                    'enqueue_app_window' => true,
                ),
            )
        );
    }
});

add_action( 'wp_enqueue_scripts', function() {
    if ( ! is_admin() ) {
        wp_enqueue_script( 'divi-typewriter-js', plugin_dir_url( __FILE__ ) . 'assets/js/typewriter.js', array(), '1.0', true );
        wp_enqueue_style( 'divi-typewriter-css', plugin_dir_url( __FILE__ ) . 'assets/css/typewriter.css' );
    }
});