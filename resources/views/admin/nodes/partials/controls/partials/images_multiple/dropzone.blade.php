<div class="row">
  <div class="col-xs-12 col-md-2 col-lg-3">
    <div class="image-dropzone" data-node-id="{{$node->id}}" data-class="{{$node->_class->shortname}}" data-field-id="{{$field->id}}" data-url="{{route('admin.nodes.upload.image')}}">
      <div class="dz-message needsclick" tabindex="-1">{{trans('admin/nodes.Перетягніть файл, або натисніть, щоб вибрати з компютера')}}</div>
    </div>

    <input multiple accept=".jpg,.jpeg,.png,.gif" type="file" id="file{{$field_lang}}{{$field_name}}" onchange="$('#{{$field_name}}_file_canged').removeClass('hidden')" name="langs[{{$field_lang}}][{{$field_name}}][]" style="position: absolute; visibility: visible; opacity: 0; cursor: pointer; top: 0; left: 0; width: 100%; height: 100%;">
  </div>
  <div class="col-xs-12 col-md-10 col-lg-9 magnific-wrapper">
    @if($field_value)
      @foreach(explode(',', $field_value) as $iamge_item)
      <a href="{{asset('imglib/full/'.$iamge_item)}}" target="_blank" class="img-thumbnail magnific">
        <div style="max-height: 170px; overflow: hidden;">
          <img src="{{asset('imglib/thumb/'.$iamge_item)}}" class="img-responsive">
        </div>
      </a>
      <div class="">
        <label class="ui-checks">
          <input type="hidden" name="clear[{{$field_lang}}][{{$field_name}}]" value="0">
          <input type="checkbox" name="clear[{{$field_lang}}][{{$field_name}}]" value="1" >
          <i></i>
          Видалити
        </label>
      </div>
      @endforeach
    @endif
    <div class="text-success hidden" id="{{$field_name}}_file_canged">
      <small><b>Файл вибрано. <br>Необхідно зберегти зміни</b></small>
    </div>

  </div>
</div>
