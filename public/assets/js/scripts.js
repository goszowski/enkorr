function appBuild()
{

    $(window).scrollTop(0);

  $('[data-toggle=tooltip]').tooltip();

  if($(window).width() >= 1200)
  {
    $('.sticky-lg').stick_in_parent();
  }

  if($(window).width() >= 768 && $(window).width() < 1200)
  {
    $('.sticky-sm').stick_in_parent();
  }

  $('.sticky-all').stick_in_parent();


  $(document).find('.publication-text img').each(function(){
    var image = $(this);
    if(image.attr('title'))
    {
      var code = '<span class="image-with-title"><img src="'+ image.attr('src') +'"><span class="image-caption"><i class="fa fa-camera"></i> '+ image.attr('title') +'</span></span>';
      $(code).insertAfter(image);
      image.hide();
    }
    
  });


  $('.loader').removeClass('active');

  $(document).find("#shareIconsCount").jsSocials({
      url: $(this).data('url'),
      text: $(this).data('title'),
      showCount: true,
      showLabel: false,
      shares: [
          "twitter",
          "facebook",
          "googleplus",
      ]
  });


}
