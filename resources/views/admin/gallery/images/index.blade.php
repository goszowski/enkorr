@extends('admin.gallery.layout')

@section('gallery')
<div class="container-fluid">
	@if(count($images))
		<div class="row gallery-grid">
			@foreach($images as $image)
				<div class="col-xs-6 col-sm-3">
					<div class="gallery-item">
						<img data-path="{{ $image->image }}" src="{{ asset('gallery/' . $image->image) }}" alt="{{ $image->name }}">
						<div class="gallery-image-info">
							<div class="gallery-image-source">{{ $image->source }}</div>
							<div class="gallery-image-tags">
								@foreach($image->tags as $tag)
									<span class="label label-default">{{ $tag->name }}</span>
								@endforeach
							</div>
						</div>
						<div class="gallery-image-destroy">
							{!! Form::open(['url'=>route('admin.gallery.images.destroy', $image->id), 'method'=>'delete']) !!}
							<button class="btn btn-danger btn-xs" onclick="return confirm('Удалить фотографию?')"><i class="fa fa-trash"></i></button>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			@endforeach
		</div>

		{!! $images->appends(['tags'=>request('tags'), 'fieldname'=>request('fieldname')])->links() !!}
	@else
		<div class="alert alert-danger">
			Нет изображений
		</div>
	@endif
</div>

<script>
	$(function() {
		$('.gallery-item img, .gallery-item .gallery-image-info').on('click', function() {
			var path = $(this).parent().find('img').data('path');
			$('#{{ request('fieldname') }}', window.opener.document).val(path);
			$('#{{ request('fieldname') }}_visual', window.opener.document).val(path);
			$('#{{ request('fieldname') }}_image', window.opener.document).attr('src', '{{ asset('gallery') }}/' + path);
			$('#{{ request('fieldname') }}_image', window.opener.document).removeClass('hidden');
			window.close();
		});
	});
</script>
@endsection