{{-- !!! WRAP IN CONDITION !!! --}}

@if(count($text->photoes))
<div class="xs-pb-15 sm-pl-30 sm-pr-30">

	<div class="owl-carousel owl-theme publication-gallery">
		{{-- Full images --}}
		@foreach( $text->photoes as $photo )
			<div class="item">
				@if($photo->name)
					<span>
						{{$photo->name}}
					</span>
				@endif
				<img src="{{iPath($photo->image, 'full')}}" alt="{{$photo->name}}">
			</div>
		@endforeach
	</div>

	{{-- <div class="owl-carousel publication-gallery-thumbs">
		@foreach( $text->photoes as $photo )
			<div class="item">
				<img src="{{iPath($photo->image, 'thumb')}}" alt="{{$photo->name}}">
			</div>
		@endforeach
	</div> --}}

</div>
@endif
