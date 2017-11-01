@extends('admin.gallery.layout')

@section('gallery')
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-body">
			{!! Form::open(['route'=>'admin.gallery.images.store', 'method'=>'post', 'files'=>true]) !!}
				<input type="hidden" name="fieldname" value="{{ request('fieldname') }}">
				
				<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
					<label for="image">Выберите фотографию на комьютере <span class="text-danger"><b>*</b></span></label>
					<input type="file" name="image" id="image" class="form-control" required>

					<span>Минимум 735px</span>

					@if ($errors->has('image'))
						  <span class="help-block">
							  <strong>{{ $errors->first('image') }}</strong>
						  </span>
					  @endif
				</div>

				<div class="form-group">
					<label for="source">Источник фотографии</label>
					<input type="text" name="source" id="source" class="form-control" placeholder="Не обязательно">
				</div>

				<div class="form-group">
					<label for="tags">Теги</label>
					<select multiple class="select2 tags" style="width: 100%;" id=tags name="tags[]"></select>
				</div>

				<div class="form-group">
					<button class="btn btn-primary">Загрузить</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection