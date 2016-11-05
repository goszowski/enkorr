@if(! ($ignore_language and $lang_key))
  @include('admin.nodes.partials.controls.partials.decimal.' . \App\Runsite\Field_settings::pull($settings, 'type_of_html_control'))
@else
<input type="hidden" name="langs[{{$field_lang}}][{{$field_name}}]" value="">
@endif
