function appBuild()
{

  // var pageTitle = $(document).find('#page-title');
  $('title').html($(document).find('#app #page-title').html());

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

  if($(document).find('.publication-gallery').length)
  {
    var duration = 500;
    setTimeout(function() {
        var owlGallery = $(document).find('.publication-gallery').owlCarousel({
        items: 1,
        autoHeight: true,
      }).on('changed.owl.carousel', function (e) {
         //On change of main item to trigger thumbnail item
         owlGalleryThumbs.trigger('to.owl.carousel', [e.item.index, duration, true]);
      });

      var owlGalleryThumbs = $(document).find('.publication-gallery-thumbs').owlCarousel({
        responsive:{
          0:{
           items:2
          },
          600:{
           items:2
          },
          1000:{
           items:3
          }
         }
      }).on('click', '.owl-item', function () {
       // On click of thumbnail items to trigger same main item
       owlGallery.trigger('to.owl.carousel', [$(this).index(), duration, true]);

      }).on('changed.owl.carousel', function (e) {
       // On change of thumbnail item to trigger main item
       owlGallery.trigger('to.owl.carousel', [e.item.index, duration, true]);
      });
    }, duration);
  }
  

}
