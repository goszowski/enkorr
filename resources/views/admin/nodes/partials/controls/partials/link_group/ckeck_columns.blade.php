<div class="row">
  <div class="col-xs-12 col-md-4">

    <?php
    $cnt = count($variants);
    $cnt_3 = ceil($cnt / 3);
    $cnt_3_2 = ceil($cnt / 3 * 2);
    ?>

    @foreach($variants as $k=>$item)
      <div class="checkbox">
        <label class="ui-checks">
          <input type="checkbox" value="{{$item->id}}" name="langs[{{$field_lang}}][{{$field_name}}][]" @if(in_array($item->id, $elements)) checked @endif>
          <i></i>
          {{App\Runsite\Libraries\Locale::getDefByNode($item->id, $item->class_id)->name}}
        </label>
      </div>



      @if(($k +1) == $cnt_3)
        </div><div class="col-xs-12 col-md-4">
      @endif

      @if(($k +1) == $cnt_3_2)
        </div><div class="col-xs-12 col-md-4">
      @endif

    @endforeach

  </div>
</div>
