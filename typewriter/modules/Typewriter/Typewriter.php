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

        $words = isset( $attrs['words'] ) ? explode( "\n", $attrs['words'] ) : [];
        $speed = isset( $attrs['typing_speed'] ) ? $attrs['typing_speed'] : '120';
        $pause = isset( $attrs['pause_time'] ) ? $attrs['typing_speed'] : '2000';
        $color = isset( $attrs['text_color'] ) ? $attrs['text_color'] : '';

        // Only enqueue frontend assets if NOT in Visual Builder (D5 VB handles it via React)
        if ( ! is_admin() && ! function_exists( 'et_core_is_fb_enabled' ) || ! et_core_is_fb_enabled() ) {
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
