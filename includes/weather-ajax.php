<?php
function weather_ajax_shortcode() {
  $city = isset($_POST['city']) ? sanitize_text_field($_POST['city']) : false;

  $response = wp_remote_get( 'https://api.openweathermap.org/data/2.5/weather?q='. $city.'&limit=5&appid=a5749f6e3d488fcdd50c3be5373f57f0&units=metric' );

  $api_response = json_decode( wp_remote_retrieve_body( $response ), true );

  $temperature = $api_response["main"]["temp"];
  $temperature_min = $api_response["main"]["temp_min"];
  $temperature_max = $api_response["main"]["temp_max"];

  $weather_data = array(
    'temperature' => $temperature,
    'temperature_min' => $temperature_min,
    'temperature_max' => $temperature_max
  );

  echo json_encode($weather_data);

  wp_die();
}

add_action('wp_ajax_weather_ajax_shortcode', 'weather_ajax_shortcode');
add_action('wp_ajax_nopriv_weather_ajax_shortcode', 'weather_ajax_shortcode');
?>