<div class="panel panel-default">
  <div class="panel-heading bg-white">
    <i class="fa fa-info"></i> {{trans('admin/fields.class_info')}}
  </div>
  <table class="table table-striped table-condensed">
    <thead>
      <tr>
        <th>{{trans('admin/fields.class_id')}}</th>
        <th>{{trans('admin/fields.class_name')}}</th>
        <th>{{trans('admin/fields.class_shortname')}}</th>
        <th>{{trans('admin/fields.class_default_controller')}}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><small>{{$class->id}}</small></td>
        <td>{{$class->name}}</td>
        <td>{{$class->shortname}}</td>
        <td>{{$class->default_controller}}</td>
      </tr>
    </tbody>
  </table>
</div>
