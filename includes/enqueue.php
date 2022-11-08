<?php
add_action( 'init', 'weather_ajax' );

function weather_ajax() {
   wp_register_script( "weather_ajax_script", WEATHER_URL.'/public/js/weather-ajax.js', array('jquery') );
   wp_localize_script( 'weather_ajax_script', 'weather_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' )));        

   wp_enqueue_script( 'jquery' );
   wp_enqueue_script( 'weather_ajax_script' );
}
?>