@if(isset($banners['up']))
	<div class="xs-pt-5 xs-pb-5 visible-sm visible-md visible-lg">
	  <a href="{{$banners['up']->link}}" target="_blank" rel="nofollow">
          <img src="{{iPath($banners['up']->image, 'full')}}" class="img-responsive" alt="">
      </a>
	</div>
@endif
