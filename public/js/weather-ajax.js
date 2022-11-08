(function($) {
  $(document).ready(function() {

    $('#addCity').on('click',function(){

      let city = $('input:text').val();

      $.ajax({
        type: 'POST',
        url: weather_ajax_object.ajax_url,
        dataType: 'html',
        data: {
            action: 'weather_ajax_shortcode',
            city: city,
        },
        success: function(res) {
            $('.weather-wrapper').html(res);
        
        },
        error : function(error){     console.log(weather_ajax_object.ajax_url)}
      })

    })
  });

})(jQuery);