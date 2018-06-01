(function($, _w){


  $(document).ready(function(){

    // Highlight the current active location in Main navigation
    $('div#mainNavigationBar a[href="'+_w.location.href+'"]').parent().addClass('active');

  });

  _w.gpt_validate_captcha = function(response){
    console.log(response);
  }

})(jQuery, window);
