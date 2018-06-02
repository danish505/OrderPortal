(function($, _w){
  $(document).ready(function(){
    // Highlight the current active location in Main navigation
    $('div#mainNavigationBar a[href="'+_w.location.href+'"]').parent().addClass('active');
  });

  if($.fn.pwstrength){
    $('form#user_activation input#password').pwstrength();
  }
})(jQuery, window);
