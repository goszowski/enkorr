{{-- !!! WRAP IN CONDITION !!! --}}

@if(count($text->photoes))
<div class="xs-pb-15">

	<div class="owl-carousel publication-gallery">
		{{-- Full images --}}
		@foreach( $text->photoes as $photo )
			<div class="item">
				<span>
					{{$photo->name}}
				</span>
				<img src="{{iPath($photo->image, 'full')}}" alt="{{$photo->name}}">
			</div>
		@endforeach
	</div>

	<div class="owl-carousel publication-gallery-thumbs">
		{{-- Thumbs --}}
		@foreach( $text->photoes as $photo )
			<div class="item">
				<img src="{{iPath($photo->image, 'thumb')}}" alt="{{$photo->name}}">
			</div>
		@endforeach
	</div>

</div>
@endif
