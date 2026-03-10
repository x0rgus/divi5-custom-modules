<?php

class Divi_Typewriter extends ET_Builder_Module {

    public $slug       = 'divi_typewriter';
    public $vb_support = 'on';

    function init() {
        $this->name = esc_html__('Typewriter Text', 'divi-typewriter');
    }

    function get_fields() {

        return [

            'words' => [
                'label' => 'Words',
                'type' => 'textarea',
                'description' => 'One word per line'
            ],

            'typing_speed' => [
                'label' => 'Typing Speed (ms)',
                'type' => 'text',
                'default' => '120'
            ],

            'pause_time' => [
                'label' => 'Pause Time',
                'type' => 'text',
                'default' => '2000'
            ],

            'text_color' => [
                'label' => 'Text Color',
                'type' => 'color-alpha'
            ]

        ];
    }

    function render($attrs, $content = null, $render_slug) {

        $words = explode("\n", $this->props['words']);
        $speed = $this->props['typing_speed'];
        $pause = $this->props['pause_time'];
        $color = $this->props['text_color'];

        wp_enqueue_script(
            'divi-typewriter-js',
            plugin_dir_url(__FILE__) . '../assets/js/typewriter.js',
            [],
            '1.0',
            true
        );

        wp_enqueue_style(
            'divi-typewriter-css',
            plugin_dir_url(__FILE__) . '../assets/css/typewriter.css'
        );

        $style = $color ? "style='color:$color'" : "";

        return sprintf(
            '<span class="divi-typewriter"
                data-words=\'%s\'
                data-speed="%s"
                data-pause="%s"
                %s
            ></span>',
            json_encode($words),
            esc_attr($speed),
            esc_attr($pause),
            $style
        );

    }

}

new Divi_Typewriter;