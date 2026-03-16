<?php

class Divi_Typewriter extends ET_Builder_Module {

    public $slug       = 'divi_typewriter';
    public $vb_support = 'on';

    public function init() {
        // Handled via module.json
    }

    /**
     * Server-side rendering (SSR)
     */
    public function render( $attrs, $content = null, $render_slug ) {

        // Defensive checks for D5 attributes
        $words = isset( $attrs['words'] ) ? explode( "\n", (string) $attrs['words'] ) : [];
        $speed = isset( $attrs['typing_speed'] ) ? (int) $attrs['typing_speed'] : 120;
        $pause = isset( $attrs['pause_time'] ) ? (int) $attrs['pause_time'] : 2000;
        $color = isset( $attrs['text_color'] ) ? (string) $attrs['text_color'] : '';

        // Prevent frontend script loading in Visual Builder to avoid conflicts
        if ( ! is_admin() ) {
            wp_enqueue_script(
                'divi-typewriter-js',
                plugin_dir_url( __FILE__ ) . '../../assets/js/typewriter.js',
                [],
                '1.0',
                true
            );

            wp_enqueue_style(
                'divi-typewriter-css',
                plugin_dir_url( __FILE__ ) . '../../assets/css/typewriter.css'
            );
        }

        $style = $color ? "style='color:$color'" : "";

        return sprintf(
            '<span class="divi-typewriter"
                data-words=\'%s\'
                data-speed="%s"
                data-pause="%s"
                %s
            ></span>',
            json_encode( $words ),
            esc_attr( $speed ),
            esc_attr( $pause ),
            $style
        );

    }

}
