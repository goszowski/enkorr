<div class="row">
  <div class="col-xs-12 col-md-2 col-lg-1">
    <button type="button" class="btn btn-default" onclick="$('input#file{{$field_lang}}{{$field_name}}').click();">Select file</button>
    <input accept=".jpg,.jpeg,.png,.gif" type="file" id="file{{$field_lang}}{{$field_name}}" onchange="$('#{{$field_name}}_file_canged').removeClass('hidden')" name="langs[{{$field_lang}}][{{$field_name}}]" style="position: absolute; visibility: hidden; width: 0; height: 0;">
  </div>
  <div class="col-xs-12 col-md-10 col-lg-11 magnific-wrapper">
    @if($field_value)
      <a href="{{asset('imglib/full/'.$field_value)}}" target="_blank" class="img-thumbnail magnific">
        <div style="max-height: 170px; overflow: hidden;">
          <img src="{{asset('imglib/thumb/'.$field_value)}}" class="img-responsive">
        </div>
      </a>
      <div class="">
        <label class="ui-checks">
          <input type="hidden" name="langs[{{$field_lang}}][{{$field_name}}_remove]" value="0">
          <input type="checkbox" name="langs[{{$field_lang}}][{{$field_name}}_remove]" value="1" >
          <i></i>
          Видалити
        </label>
      </div>
    @endif
    <div class="text-success hidden" id="{{$field_name}}_file_canged">
      <small><b>Файл вибрано. <br>Необхідно зберегти зміни</b></small>
    </div>
  </div>
</div>
