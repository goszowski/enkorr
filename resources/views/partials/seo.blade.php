{{-- SEO Sections --}}
@section('title')@if(isset($currentFields->title) and !empty($currentFields->title)){{$currentFields->title}}@else{{$currentFields->name}}@endif @endsection
{{-- @section('keywords')@if(isset($currentFields->keywords)){{$currentFields->keywords}}@else{{$currentFields->name}}@endif @endsection --}}
@section('description')@if(isset($currentFields->description)){{$currentFields->description}}@else{{$currentFields->name}}@endif @endsection
{{-- [END] SEO Sections --}}

{{-- Open Graph Sections --}}
@section('og:title')@if(isset($currentFields->title)){{$currentFields->title}}@else{{$currentFields->name}}@endif @endsection
@section('og:image')@if(isset($currentFields->image)){{asset(PH::iPath($currentFields->image, 'full'))}}@endif @endsection
{{-- [END] Open Graph Sections --}}

@if(Input::get('ajax'))
<div id="page-title" style="display: none;">@if(isset($currentFields->title) and !empty($currentFields->title)){{$currentFields->title}}@else{{$currentFields->name}}@endif</div>
@endif
