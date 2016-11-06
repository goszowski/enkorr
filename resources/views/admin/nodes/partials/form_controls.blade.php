<!-- Form controls -->
<div class="form-group">
  <div class="col-md-10 col-md-offset-2">
    <div class="form-group">
      <div class="container-fluid">
        <button type="submit" class="btn btn-dark"><i class="fa fa-check"></i> {{trans('admin/nodes.update')}}</button>
        @if($node->id != 1)
          <a href="{{route('admin.nodes.destroy', $node->id)}}" class="btn btn-raised btn-danger" onclick="if(!confirm('{{trans('admin/nodes.are you sure')}}?')) return false;"><i class="fa fa-trash"></i> <span class="hidden-xs">{{trans('admin/nodes.remove')}}</span></a>
        @endif
      </div>
    </div>
    <div class="form-group">
      <div class="container-fluid">
        <div class="">
          <b>Після оновлення:</b>
        </div>
        <label class="ui-checks" style="margin-right: 10px">
          <input type="radio" name="do_after" value="stay" checked id="do_after">
          <i></i>
          {{trans('admin/nodes.do_after.stay')}}
        </label>

        <label class="ui-checks" style="margin-right: 10px">
          <input type="radio" name="do_after" value="go_up"  id="do_after">
          <i></i>
          {{trans('admin/nodes.do_after.go_up')}}
        </label>
      </div>
    </div>
  </div>
</div>
<!-- / Form controls -->
