<?php
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;

add_action( 'init', function() {
    $module_folder = plugin_dir_path( __FILE__ ); 

    if ( class_exists( 'ET\Builder\Packages\ModuleLibrary\ModuleRegistration' ) ) {
        ModuleRegistration::register_module(
            $module_folder,
            array(
                'render_callback' => 'divi_typewriter_render',
            )
        );
    }
});

function divi_typewriter_render( $render_output, $module ) {
    $props = $module->props;

    $words_string = isset( $props['words'] ) ? $props['words'] : 'Typewriter';
    $words        = array_filter( array_map( 'trim', explode( "\n", $words_string ) ) );
    $words_array  = array_values( $words );
    
    $speed = isset( $props['typing_speed'] ) ? (int) $props['typing_speed'] : 120;
    $pause = isset( $props['pause_time'] ) ? (int) $props['pause_time'] : 2000;
    $color = isset( $props['text_color'] ) ? (string) $props['text_color'] : '#333333';

    $style = $color ? "style='color:" . esc_attr( $color ) . "'" : "";
    $first_word = ! empty( $words_array ) ? esc_html( $words_array[0] ) : '';

    return sprintf(
        '<span class="divi-typewriter" data-words=\'%s\' data-speed="%s" data-pause="%s" %s>%s</span>',
        wp_json_encode( $words_array ),
        esc_attr( $speed ),
        esc_attr( $pause ),
        $style,
        $first_word
    );
}