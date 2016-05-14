<input type="file" id="file{{$field_lang}}{{$field_name}}" name="langs[{{$field_lang}}][{{$field_name}}]" style="position: absolute; visibility: hidden; width: 0; height: 0; overflow: hidden;">
<div class="row">
  <div class="col-xs-12 magnific-wrapper">
    @if($field_value)
      <a href="{{asset('imglib/full/'.$field_value)}}" target="_blank" class="img-thumbnail magnific">
        <div style="max-height: 170px; overflow: hidden;">
          <img src="{{asset('imglib/thumb/'.$field_value)}}" class="img-responsive">
        </div>
      </a>
    @endif
  </div>
</div>
