<?php

class Divi_Typewriter extends ET_Builder_Module {

    public $slug       = 'divi_typewriter';
    public $vb_support = 'on';

    public function init() {
        $this->name = esc_html__( 'Typewriter Text', 'divi-typewriter' );
    }

    public function get_fields() {
            return array(
                'words' => array(
                    'label'           => esc_html__( 'Words', 'divi-typewriter' ),
                    'description'     => esc_html__( 'Enter the words you want to type out. Place each word or phrase on a new line.', 'divi-typewriter' ),
                    'type'            => 'textarea',
                    'option_category' => 'basic_option',
                ),
                'typing_speed' => array(
                    'label'           => esc_html__( 'Typing Speed (ms)', 'divi-typewriter' ),
                    'description'     => esc_html__( 'Set the typing speed in milliseconds. Lower numbers mean faster typing (e.g., 50 for fast, 120 for normal).', 'divi-typewriter' ),
                    'type'            => 'text',
                    'option_category' => 'basic_option',
                ),
                'pause_time' => array(
                    'label'           => esc_html__( 'Pause Time (ms)', 'divi-typewriter' ),
                    'description'     => esc_html__( 'How long to wait before deleting the word and typing the next one (e.g., 2000 = 2 seconds).', 'divi-typewriter' ),
                    'type'            => 'text',
                    'option_category' => 'basic_option',
                ),
                'text_color' => array(
                    'label'           => esc_html__( 'Text Color', 'divi-typewriter' ),
                    'description'     => esc_html__( 'Choose the color of the animated typewriter text.', 'divi-typewriter' ),
                    'type'            => 'color-alpha',
                    'option_category' => 'configuration',
                ),
            );
        }

    /**
     * Server-side rendering (SSR)
     */
    public function render( $attrs, $content = null, $render_slug ) {

        // Use $this->props for legacy compatibility if $attrs is empty
        $props = ! empty( $attrs ) ? $attrs : $this->props;

        $words = isset( $props['words'] ) ? explode( "\n", (string) $props['words'] ) : [];
        $speed = isset( $props['typing_speed'] ) ? (int) $props['typing_speed'] : 120;
        $pause = isset( $props['pause_time'] ) ? (int) $props['pause_time'] : 2000;
        $color = isset( $props['text_color'] ) ? (string) $props['text_color'] : '';

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

        $first_word = !empty($words) ? esc_html($words[0]) : '';

        return sprintf(
            '<span class="divi-typewriter"
                data-words=\'%s\'
                data-speed="%s"
                data-pause="%s"
                %s
            >%s</span>', 
            wp_json_encode( $words ),
            esc_attr( $speed ),
            esc_attr( $pause ),
            $style,
            $first_word 
        );

    }

}
