<?php

defined( 'ABSPATH' ) or die( 'Nope, not accessing this' );

class wp_tandora_shortcode {
    public function __construct() {
        add_action('init', array($this, 'register_tandora_shortcodes'));
    }

    public function register_tandora_shortcodes() {
        add_shortcode('wp_tandora', array($this, 'tandora_shortcode_output'));
    }

    public function tandora_shortcode_output($atts, $content = '', $tag) {
        return "Adhithyan Vijayakumar";
    }
}

$wp_tandora_shortcode = new  wp_tandora_shortcode;

?>