<?php
function weather_ajax_shortcode() {
  $city = isset($_POST['city']) ? sanitize_text_field($_POST['city']) : false;
  echo do_shortcode('[weather city_name="'.$city.'"]');
  wp_die();
}

add_action('wp_ajax_weather_ajax_shortcode', 'weather_ajax_shortcode');
add_action('wp_ajax_nopriv_weather_ajax_shortcode', 'weather_ajax_shortcode');