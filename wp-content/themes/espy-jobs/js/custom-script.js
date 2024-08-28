jQuery(document).ready(function(){
    jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop() > 300) {
      jQuery('#back-to-top').fadeIn();
    } else {
      jQuery('#back-to-top').fadeOut();
    }
  });
  jQuery('#back-to-top').click(function(){
    jQuery('html, body').animate({scrollTop : 0},100);
    return false;
  });
});
