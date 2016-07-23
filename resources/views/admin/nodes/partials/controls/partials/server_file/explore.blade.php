<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }} <small class="text-muted">[{{$field_name}}]</small></div></label>
  <div class="col-md-10">
    <input maxlength="{{ \App\Runsite\Field_settings::pull($settings, 'db_field_size') }}" data-lang="{{$field_lang}}" data-group="{{$field->group_id}}" type="hidden" name="langs[{{$field_lang}}][{{$field_name}}]" id="field_{{ $field_name }}_{{ $field_lang }}" value="{{ $field_value }}" >


    @if($field_value)

    @endif
    <div class="input-group" style="max-width: 350px;">
      <input type="text" class="form-control" id="field_{{ $field_name }}_{{ $field_lang }}_visual" placeholder="File from server" readonly="readonly" value="{{ $field_value }}">
      <span class="input-group-btn">
        @if($field_value)
          <a href="{{$field_value}}" class="btn btn-default" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
        @endif
        <button type="button" class="btn btn-primary" data-toggle="modal" href="#mFiles{{$field_lang}}-{{$field_name}}"><i class="fa fa-server" aria-hidden="true"></i> Select file</button>
      </span>
    </div>




    @if($hint)
      <div class="text-muted">
        <i class="fa fa-info" aria-hidden="true"></i> {{$hint}}
      </div>
    @endif

  </div>
</div>

<div class="modal fade" id="mFiles{{$field_lang}}-{{$field_name}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select the file</h4>
      </div>
      <div class="modal-body">
        <div id="mFiles{{$field_lang}}-{{$field_name}}-list"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(function() {
    var root_add = '{{ \App\Runsite\Field_settings::pull($settings, 'custom_path') }}';

    $('#mFiles{{$field_lang}}-{{$field_name}}-list').fileTree({ root: '/public/files/' + root_add, script: '/admin/jqueryfiletree-master/dist/connectors/jqueryFileTree.php',}, function(file) {

      file = file.split("/public").pop()

      $('#field_{{ $field_name }}_{{ $field_lang }}').val(file);
      $('#field_{{ $field_name }}_{{ $field_lang }}_visual').val(file);
      $('#mFiles{{$field_lang}}-{{$field_name}}').modal('hide');
    });
  });
</script>
