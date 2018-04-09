@if(isset($banners['down']))
    <div class="form-group">
      <a href="{{$banners['down']->link}}" target="_blank" rel="nofollow">
        <img src="{{iPath($banners['down']->image, 'full')}}" class="img-responsive" alt="">
      </a>
    </div>
@endif
