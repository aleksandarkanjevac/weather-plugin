<?php

function weather_shortcode($atts){
  $location = get_option( 'weather_location_settings' );
  $city_name = $location['city_name'];

  $atts = shortcode_atts( array(
		'city_name' => $city_name,
	), $atts );

  $city = $atts['city_name'];
 
  $response = wp_remote_get( 'https://api.openweathermap.org/data/2.5/weather?q='. $city.'&limit=5&appid=a5749f6e3d488fcdd50c3be5373f57f0&units=metric' );

  $api_response = json_decode( wp_remote_retrieve_body( $response ), true );

  $temperature = $api_response["main"]["temp"];
  $temperature_min = $api_response["main"]["temp_min"];
  $temperature_max = $api_response["main"]["temp_max"];
  
  $html = '<div class="weather-wrapper"><h2>'.$city.'</h2><p>Temperature: '.$temperature.' °C</p><p>Min. Temperature: '.$temperature_min.' °C</p><p>Max. Temperature: '.$temperature_max.' °C</p>
  <input type="text" id="weatherCity" name="weather_location_settings_' . $city . '" value="' . $city . '" /><button id="addCity">Add city</button></div>';
    
  return $html;

}

add_shortcode('weather', 'weather_shortcode');
?>