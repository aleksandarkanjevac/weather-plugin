(function($) {
  $(document).ready(function() {

    $(document).on('click','.addCity',function(){

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
            var result = JSON.parse(res);
            $('#cityName').text(city)
            $('#weatherCity').attr('value', city)
            $('#temperature').text(result.temperature)
            $('#temperatureMin').text(result.temperature_min)
            $('#temperatureMax').text(result.temperature_max)
        },
        error : function(error){ console.log('error ovde')}
      })

    })
    $(document).on('keypress',function(e) {
      if(e.which == 13) {
        $('.addCity').trigger('click');
        return false;
      }
    });
  });

})(jQuery);