<div class="container-fluid xs-pt-30 xs-pb-30 visible-sm visible-md visible-lg">
  <div class="row">
    @if(isset($banners['up']))
      <div class="col-md-9 col-lg-9 text-right visible-md visible-lg">
          <a href="{{$banners['up']->link}}" target="_blank" rel="nofollow">
              <img src="{{iPath($banners['up']->image, 'full')}}" class="img-responsive" alt="">
          </a>
      </div>
    @endif
  </div>
</div>
