<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }} <small class="text-muted">[{{$field_name}}]</small></div></label>
  <div class="col-md-10">
    <input maxlength="{{ \App\Runsite\Field_settings::pull($settings, 'db_field_size') }}" data-lang="{{$field_lang}}" data-group="{{$field->group_id}}" type="hidden" name="langs[{{$field_lang}}][{{$field_name}}]" id="field_{{ $field_name }}_{{ $field_lang }}" value="{{ $field_value }}" >


    @if($field_value)

    @endif
    <div class="input-group" style="max-width: 450px;">
      <input type="text" class="form-control" id="field_{{ $field_name }}_{{ $field_lang }}_visual" placeholder="File from server" readonly="readonly" value="{{ $field_value }}">
      <span class="input-group-btn">
        @if($field_value)
          <a href="{{$field_value}}" class="btn btn-primary" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> Переглянути</a>
        @endif
      </span>
    </div>




    @if($hint)
      <div class="text-muted">
        <i class="fa fa-info" aria-hidden="true"></i> {{$hint}}
      </div>
    @endif

  </div>
</div>
