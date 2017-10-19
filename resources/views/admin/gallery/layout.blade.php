@extends('admin.app')
@section('content')
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		  <form class="navbar-form navbar-left" action="{{ route('admin.gallery.images.index') }}" method="GET">
		  	<input type="hidden" name="fieldname" value="{{ request('fieldname') }}">
			<div class="form-group">
			  <select multiple class="select2 search-tags" style="width: 400px;" id=tags name="tags[]">
			  	@if(isset($tags) and count($tags))
					@foreach($tags as $tag)
						<option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
			  	@endif
			  </select>
			</div>
			<button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Поиск</button>
		  </form>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="{{ route('admin.gallery.images.create') }}?fieldname={{ request('fieldname') }}"><i class="fa fa-plus"></i> Добавить фотографию</a></li>
		  </ul>
	  </div>
	</nav>
	<br><br>
	@yield('gallery')
@endsection