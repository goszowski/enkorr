@if(count($banners['right']))
  <div class="form-group">
    <a href="{{$banners['right']->link}}" target="_blank" rel="nofollow">
      <img src="{{iPath($banners['right']->image, '600px')}}" class="img-responsive" alt="">
    </a>
  </div>
@endif
