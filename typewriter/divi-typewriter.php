<?php

/**
 * Plugin Name: Divi Typewriter Module
 * Description: Simple typewriter text module for Divi.
 * Version: 0.1
 * Author: Lucas Procópio (lucas.pr1@hotmail.com)
 */

if (!defined('ABSPATH')) exit;

function divi_typewriter_load() {

    if (!class_exists('ET_Builder_Module')) return;

    require_once plugin_dir_path(__FILE__) . 'modules/Typewriter.php';

}

add_action('et_builder_ready', 'divi_typewriter_load');