@if($value)
  <div class="magnific-wrapper">
    <a href="{{asset('imglib/full/'.$value)}}" class="img-thumbnail magnific" target="_blank" style="max-height: 80px; max-width: 80px; overflow: hidden">
      <img src="{{asset('imglib/thumb/'.$value)}}" class="img-responsive">
    </a>
  </div>
@endif
