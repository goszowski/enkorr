{{-- !!! WRAP IN CONDITION !!! --}}

<div class="xs-pb-15">

	<div class="owl-carousel publication-gallery">
		{{-- Full images --}}
		@for($i=1; $i<=10; $i++)
			<div class="item">
				<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente a, nesciunt amet voluptatum non aliquam quia magnam. Vitae officia voluptatibus, laudantium id repudiandae, reprehenderit dicta, eum rem minima asperiores tempore!</span>
				<img src="{{ url('assets/images/demo/publication-gallery/'.$i.'.jpg') }}" alt="">
			</div>
		@endfor
	</div>

	<div class="owl-carousel publication-gallery-thumbs">
		{{-- Thumbs --}}
		@for($i=1; $i<=10; $i++)
			<div class="item">
				<img src="{{ url('assets/images/demo/publication-gallery/'.$i.'.jpg') }}" alt="">
			</div>
		@endfor
	</div>

</div>