@extends('admin.gallery.layout')

@section('gallery')
<div class="container-fluid">
	{!! Form::open(['url'=>route('admin.gallery.images.crop', $image->id), 'method'=>'patch']) !!}

	<input type="hidden" name="fieldname" value="{{request('fieldname')}}">

	<div class="row">
		<div class="col-md-10 col-md-push-1">
			<div class="form-group">
				<div style="position: relative;">
				  <img id="image" src="{{_asset('gallery/'.$image->image)}}">
				  <input type="hidden" name="x">
				  <input type="hidden" name="y">
				  <input type="hidden" name="width">
				  <input type="hidden" name="height">
				</div>
			</div>
		</div>
	</div>

	<div class="text-center">
		<button type="submit" class="btn btn-success">Сохранить</button>
	</div>
	{!! Form::close() !!}
</div>

<style>
	#image {
		max-width: 100%;
	}
</style>

<script>
	$(function() {
		$('#image').cropper({
		  aspectRatio: 620 / 400,
		  minCropBoxWidth: 620,
		  minCropBoxHeight: 400,
		  zoomable: false,
		  center: true,
		  autoCropArea: 1,
		  crop: function(e) {
		    // Output the result data for cropping image.
		    $('[name=x]').val(e.x);
		    $('[name=y]').val(e.y);
		    $('[name=width]').val(e.width);
		    $('[name=height]').val(e.height);
		  }
		});
	});
</script>
@endsection
