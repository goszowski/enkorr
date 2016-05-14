<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }} <small class="text-muted">[{{$field_name}}]</small></div></label>
  <div class="col-md-10">

    @if(! ($ignore_language and $lang_key))
      @include('admin.nodes.partials.controls.partials.image.' . \App\Runsite\Field_settings::pull($settings, 'type_of_html_control'))
    @endif

    @if($hint)
      <div class="text-muted">
        <i class="fa fa-info" aria-hidden="true"></i> {{$hint}}
      </div>
    @endif

  </div>
</div>
