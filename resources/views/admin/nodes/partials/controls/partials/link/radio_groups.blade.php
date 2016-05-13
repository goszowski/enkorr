<div class="row">
  <div class="col-xs-12 col-md-4">

    @foreach($variants as $k=>$item)
      <div class="radio">
        <label class="ui-checks">
          <input type="radio" value="{{$item->id}}" name="langs[{{$field_lang}}][{{$field_name}}]" @if($item->id == $field_value) checked @endif>
          <i></i>
          {{Locale::getDefByNode($item->id)->name}}
        </label>
      </div>



      @if(($k +1) == ceil(count($variants) / 3))
        </div><div class="col-xs-12 col-md-4">
      @endif

      @if(($k +1) == ceil(count($variants) / 3 * 2))
        </div><div class="col-xs-12 col-md-4">
      @endif

    @endforeach

  </div>
</div>
