@if($value)
  <div class="img-thumbnail" style="max-height: 80px; max-width: 80px; overflow: hidden">
    <img src="{{asset('imglib/thumb/'.$value)}}" class="img-responsive">
  </div>

@endif
