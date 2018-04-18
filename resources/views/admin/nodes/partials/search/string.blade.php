{{Form::open(['url'=>url('/ru/panel-admin/nodes/edit/'.$node->id.'?class='.$class->id), 'method'=>'get'])}}
<input type="hidden" name="condition" value="like">
<div class="input-group">
  <input type="text" class="form-control input-sm" name="filter_value" value="{{$filter == $field->shortname ? $filter_value : ''}}">
  <input type="hidden" name="filter" value="{{$field->shortname}}">
  <span class="input-group-btn">
    <button type="submit" class="btn btn-default btn-sm">
      <i class="fa fa-search" aria-hidden="true"></i>
    </button>
  </span>
</div>
{{Form::close()}}
