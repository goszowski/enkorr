{{-- SEO Sections --}}
@section('title')@if(isset($currentFields->title)){{$currentFields->title}}@else{{$currentFields->name}}@endif @endsection
@section('keywords')@if(isset($currentFields->keywords)){{$currentFields->keywords}}@else{{$currentFields->name}}@endif @endsection
@section('description')@if(isset($currentFields->description)){{$currentFields->description}}@else{{$currentFields->name}}@endif @endsection
{{-- [END] SEO Sections --}}

{{-- Open Graph Sections --}}
@section('og:title')@if(isset($currentFields->title)){{$currentFields->title}}@else{{$currentFields->name}}@endif @endsection
@section('og:image')@if(isset($currentFields->image)){{asset(PH::iPath($currentFields->image, 'full'))}}@endif @endsection
{{-- [END] Open Graph Sections --}}
