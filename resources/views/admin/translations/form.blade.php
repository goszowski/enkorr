<div class="form-group">
  <label>Key</label>
  @if(isset($translations))
    <input type="text" class="form-control" name="key" value="{{$translations[0]->key}}" readonly="">
  @else
    <input type="text" class="form-control" name="key" value="{{old('key')}}">
  @endif
</div>

@foreach($languages as $lang)
  <?php
  // collect($translations);
  //
  // $filtered = $translations->where('language_id', $lang->id);

  // $filtered->all();
  ?>
  <div class="form-group">
    <label>{{$lang->name}}</label>
    <input type="text" class="form-control" name="lang[{{$lang->id}}]" value="{{isset($translations->where('language_id', $lang->id)->first()->_value) ?$translations->where('language_id', $lang->id)->first()->_value : ''}}">
    {{-- @if(isset($translations))
      @foreach($translations as $k=>$v)

        @if($v->language_id == $lang->id)
          <input type="text" class="form-control" name="lang[{{$lang->id}}]" value="{{$v->_value}}">
        @else
          <input type="text" class="form-control" name="lang[{{$lang->id}}]" value="">
        @endif
      @endforeach
    @else
      <input type="text" class="form-control" name="lang[{{$lang->id}}]" value="{{old('lang['.$lang->id.']')}}">
    @endif --}}

  </div>
@endforeach
