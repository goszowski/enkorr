<div class="form-group">
  <label for="field_{{ $field_name }}_{{ $field_lang }}" class="col-md-2 control-label"><div class="text-left">{{ $field_label }} <small class="text-muted">[{{$field_name}}]</small></div></label>
  <div class="col-md-10">

    <div class="row">
      <div class="col-xs-12 col-md-2 col-lg-1">
        <button type="button" class="btn btn-default" onclick="$('input#file{{$field_lang}}{{$field_name}}').click();">Select file</button>
        <input type="file" id="file{{$field_lang}}{{$field_name}}" name="langs[{{$field_lang}}][{{$field_name}}]" style="position: absolute; visibility: hidden; width: 0; height: 0;">
      </div>
      <div class="col-xs-12 col-md-10 col-lg-11">
        @if($field_value)
          <a href="#" class="img-thumbnail">
            <div style="max-height: 170px; overflow: hidden;">
              <img src="{{asset('imglib/thumb/'.$field_value)}}" class="img-responsive">
            </div>
          </a>
        @endif
      </div>
    </div>




  </div>
</div>
