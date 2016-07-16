<script type="text/javascript">
$(function() {
  $(window).bind('keydown', function(event) {
    if (event.ctrlKey || event.metaKey) {
        switch (String.fromCharCode(event.which).toLowerCase()) {
        case 's':
            event.preventDefault();
            $('.ctrl-s-auto-save').submit();
            break;
        }
    }
});
})
</script>
