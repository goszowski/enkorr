
@foreach($variants as $k=>$item)

  <div class="radio radio-inline" style="margin-left: 0; padding-left: 0; padding-right: 15px;">
    <label class="ui-checks">
      <input type="radio" value="{{$item->id}}" name="langs[{{$field_lang}}][{{$field_name}}]" @if($item->id == $field_value) checked @endif>
      <i></i>
      {{Locale::getDefByNode($item->id)->name}}
    </label>
  </div>
@endforeach
