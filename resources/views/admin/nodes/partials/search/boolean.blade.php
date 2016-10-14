{{Form::open(['url'=>url('panel-admin/nodes/edit/'.$node->id.'?class='.$class->id), 'method'=>'get'])}}
<div class="input-group">
  {{-- <input type="text" class="form-control input-sm" name="filter_value" value="{{$filter_value}}"> --}}
  <select class="form-control input-sm" name="filter_value">
    <option value="1" {{($filter == $field->shortname and $filter_value == 1) ? 'selected' : ''}}>{{trans('admin/nodes.yes')}}</option>
    <option value="0" {{($filter == $field->shortname and $filter_value == 0) ? 'selected' : ''}}>{{trans('admin/nodes.no')}}</option>
  </select>
  <span class="input-group-btn">
    <button type="submit" class="btn btn-default btn-sm" name="filter" value="{{$field->shortname}}">
      <i class="fa fa-search" aria-hidden="true"></i>
    </button>
  </span>
</div>
{{Form::close()}}
