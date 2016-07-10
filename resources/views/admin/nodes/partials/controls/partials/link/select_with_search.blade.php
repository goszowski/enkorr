<select class="selectpicker" data-live-search="true" name="langs[{{$field_lang}}][{{$field_name}}]">
  <option value="0">---</option>
  @foreach($variants as $k=>$item)
    <option value="{{$item->id}}" @if($item->id == $field_value) selected @endif>{{\App\Runsite\Libraries\Locale::getDefByNode($item->id)->name}}</option>
  @endforeach
</select>
