@if(!($ignore_language and $lang_key))
<div class="form-group">
  @include('admin.nodes.partials.controls.partials.boolean.' . \App\Runsite\Field_settings::pull($settings, 'type_of_html_control'))
</div>
@else
<input type="hidden" name="langs[{{$field_lang}}][{{$field_name}}]" value="">
@endif
