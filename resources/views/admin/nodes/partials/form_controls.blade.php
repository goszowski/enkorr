<!-- Form controls -->
<div class="form-group">
  <div class="col-md-10 col-md-offset-2">
    <button type="submit" class="btn btn-dark"><i class="fa fa-check"></i> {{trans('admin/nodes.update')}}</button>
    <a href="{{route('admin.nodes.destroy', $node->id)}}" class="btn btn-raised btn-danger"><i class="fa fa-trash"></i> {{trans('admin/nodes.remove')}}</a>
  </div>
</div>
<!-- / Form controls -->
