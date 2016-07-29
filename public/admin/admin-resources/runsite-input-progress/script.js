$(function(){
  $("#app-container").on('focus', '.runsite-input-progress input, .runsite-input-progress textarea', function() {
    $(this).parent().addClass('focus');
    runsiteInputProgressSet($(this));
  });

  $("#app-container").on('blur', '.runsite-input-progress input, .runsite-input-progress textarea', function() {
    $(this).parent().removeClass('focus');
  });

  $("#app-container").on('keyup', '.runsite-input-progress input, .runsite-input-progress textarea', function() {
    var curr = $(this);
    var max_length = curr.attr('maxlength');
    var curr_lenght = curr.val().length;
    if(max_length == curr_lenght && curr.data('before-length') == curr_lenght) {
      curr.parent().addClass('has-error');
      setTimeout(function(){
        curr.parent().removeClass('has-error');
      }, 50);
    }
    runsiteInputProgressSet(curr);
  });

  var runsiteInputProgressSet = function(curr) {
    var progress = curr.parent().find('.runsite-input-progress-bar-inner');
    var max_length = curr.attr('maxlength');
    var curr_lenght = curr.val().length;
    var percent = curr_lenght * 100 / max_length;

    progress.css('width', percent+'%');
    curr.data('before-length', curr_lenght);
  }

});
