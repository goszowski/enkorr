
@foreach($variants as $k=>$item)

  <div class="radio">
    <label class="ui-checks">
      <input type="radio" value="{{$item->id}}" name="langs[{{$field_lang}}][{{$field_name}}]" @if($item->id == $field_value) checked @endif>
      <i></i>
      {{\App\Runsite\Libraries\Locale::getDefByNode($item->id)->name}}
    </label>
  </div>
@endforeach
