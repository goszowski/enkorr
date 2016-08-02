@if(! ($ignore_language and $lang_key))
  @include('admin.nodes.partials.controls.partials.integer.' . \App\Runsite\Field_settings::pull($settings, 'type_of_html_control'))
@endif
