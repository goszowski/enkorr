<div class="row">
  <div class="col-xs-12">
    <input type="hidden" name="langs[{{$field_lang}}][{{$field_name}}][]" value="">

    @foreach($variants as $k=>$item)
      <div class="checkbox">
        <label class="ui-checks">
          <input type="checkbox" value="{{$item->id}}" name="langs[{{$field_lang}}][{{$field_name}}][]" @if(in_array($item->id, $elements)) checked @endif>
          <i></i>
          {{App\Runsite\Libraries\Locale::getDefByNode($item->id, $item->class_id)->name}}
        </label>
      </div>


    @endforeach

  </div>
</div>
