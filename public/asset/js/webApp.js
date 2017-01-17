if ('serviceWorker' in navigator) {
  navigator.serviceWorker
           .register('/service-worker.js')
           .then(function() { console.log('Service Worker Registered'); });
}

$(function() {
  'use strict';




  $(document).on('click', 'a[data-ajax="true"], [data-ajax-inner="true"] a', function() {

    // hide opened navigation
    if($('.navbar-toggle').length && !$('.navbar-toggle').hasClass('collapsed')) {
      $('.navbar-toggle').click();
    }

    $(document).find('.dropdown.open [data-toggle="dropdown"]').click();

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


var cachedPages = [];

function load_page(href){
  if(href != '#')
  {
    var baseHref = href;
    if(href.indexOf('?') + 1) href += '&ajax=true';
    else href += '?ajax=true';

    if($('body').data('ajax-cache') == true && cachedPages[baseHref] != undefined)
    {
      $('#app-content').html(cachedPages[baseHref]);
      $('title').html($(document).find('#page-title').html());
    }
    else
    {
      $.get(href, function(data){
        $('#app-content').html(data);
        $('title').html($(document).find('#page-title').html());
        console.log('load from remote: ' + baseHref);

        // if(cachedPages.length > 0)
        // {
        //   // cachedPages = [];
        //   console.log('cache clear: ' + cachedPages.length);
        //
        // }

        cachedPages[baseHref] = data;
        ajax_call();
        $(window).scrollTop(0);
      }).fail(function() {
        if (href.indexOf("?")>-1){
          href = href.substr(0,href.indexOf("?"));
          }
        window.location.href = href;
      });
    }

    setActivesMenu();


  }
  else {
    $(window).scrollTop(0);
  }

}



var setActivesMenu = function() {
  $('.main-navigation a[data-ajax="true"]').parent().removeClass('active');
  var path_name = window.location.pathname;
  var path_parts = path_name.split('/');
  var root_path = path_parts[1];
  var root_path2 = path_parts[2];

  $('.main-navigation a[data-ajax="true"]').each(function() {
    var current = $(this);
    var current_path = current.data('link');
    if(current_path == '/' + root_path || current_path == '/' + root_path2) {
      current.parent().addClass('active');
    }
  });
}

function ajax_call()
{
  // .....
}
