$(function() {
  $(document).on('click', 'a[data-ajax="true"], [data-ajax-inner="true"] a', function() {

    // hide opened navigation
    if($('.navbar-toggle').length && !$('.navbar-toggle').hasClass('collapsed')) {
      $('.navbar-toggle').click();
    }

    var href = $(this).attr('href');
    history.pushState(null, null, href);
    load_page(href);
    return false;

  });


  $(window).on("popstate", function(e) {
		var href = location.href;
    // var hash = href.substring(href.indexOf("#"));
    load_page(href);

	});
});


function load_page(href){
  // progressStart();
  if(href != '#')
  {
    if(href.indexOf('?') + 1) href += '&ajax=true';
    else href += '?ajax=true';

    $.get(href, function(data){
      $('#app-content').html(data);
      $('title').html($(document).find('#page-title').html());
      ajax_call();
      $(window).scrollTop(0);
      // return progressEnd();
    }).fail(function() {
      window.location.href = href;
    });
  }
  else {
    // progressEnd();
    $(window).scrollTop(0);
  }

}



function ajax_call()
{
  // .....
}
