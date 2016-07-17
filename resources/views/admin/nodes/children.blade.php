@if($showChildren)

@if(count($children) and count($all_fields))

  @if($class->can_export == 1 or ($class->can_export == 2 and $node->can_export_children))
    <!-- Modal window for select export fields -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-export">
      <div class="modal-dialog">
        <div class="modal-content">
          {{Form::open(['route'=>'admin.nodes.export'])}}
          <input type="hidden" name="parent_id" value="{{$node->id}}">
          <input type="hidden" name="class_id" value="{{$class->id}}">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{trans('admin/nodes.export_data')}}</h4>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-6">
              <div class="modal-body">
                <span class="badge bg-primary">1</span> {{trans('admin/nodes.select_fields_to_export')}}
              </div>
              <table class="table table-striped">
                @foreach($all_fields as $field)
                  <tr>
                    <td>
                      <label class="ui-checks">
                        <input type="checkbox" name="fields[]" value="{{$field->shortname}}" @if($field->shortname == 'name') checked @endif >
                        <i></i>
                        {{$field->name}}
                      </label>
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
            <div class="col-xs-12 col-md-6">
              <div class="modal-body">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group">
                      <p><span class="badge bg-primary">2</span> {{trans('admin/nodes.select_language')}}</p>
                      <select class="selectpicker" name="language_id">
                        @foreach($languages as $lang)
                          <option value="{{$lang->id}}">{{$lang->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group">
                      <p><span class="badge bg-primary">3</span> {{trans('admin/nodes.select_count')}}</p>
                      <select class="selectpicker" name="limit">
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="500">500</option>
                        <option value="1000">1000</option>
                        <option value="0">Всі записи</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group">
                      <p><span class="badge bg-primary">4</span> {{trans('admin/nodes.file_type')}}</p>
                      <select class="selectpicker" name="type">
                        <option value="xls">Excel5 (xls)</option>
                        <option value="xlsx">Excel2007 (xlsx)</option>
                        <option value="csv">CSV</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin/nodes.close')}}</button>
            <button type="submit" class="btn btn-dark">{{trans('admin/nodes.export')}}</button>
          </div>
          {{Form::close()}}
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- [end] Modal window for select export fields -->
  @endif
@endif

<div class="p-md" style="padding-bottom: 0;">
  <ul class="nav nav-sm nav-tabs">
    @foreach($dependencies as $dk=>$dep)
      <li role="presentation" class="@if($dep->subclass_id == $class->id) active @endif">
        <a href="{{route('admin.nodes.edit', [$node->id, 'class'=>$dep->subclass_id])}}">{{$dep->classes->name_more}}</a>
      </li>
    @endforeach

    @foreach($NodeDependencies as $dk=>$dep)
      <li role="presentation" class="@if($dep->subclass_id == $class->id) active @endif">
        <a href="{{route('admin.nodes.edit', [$node->id, 'class'=>$dep->subclass_id])}}">{{$dep->classes->name_more}}</a>
      </li>
    @endforeach

    @if(count($children))
      @if($class->can_export == 1 or ($class->can_export == 2 and $node->can_export_children))
        <div class="pull-right">
          <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-export"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</button>
        </div>
      @endif
    @endif
  </ul>
  <div class="b-a no-b-t bg-white m-b tab-content">
    @if(count($children))
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              @foreach($fields as $field)
              <th>
                {{$field->name}}
              </th>
              @endforeach
              @if(!$class->order_by)
                <th class="text-center">{{trans('admin/nodes.order')}}</th>
              @endif
              <th class="text-right">{{trans('admin/nodes.action')}}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($children as $k=>$child)
            <tr>
              <?php
                // $locale = Locale::getDefByNode($child->id);
              ?>
              @foreach($fields as $field)
              <td>
                @include('admin.nodes.partials.visualization.'.$field->type->input_controller, ['value'=> $child->{$field->shortname}])
              </td>
              @endforeach

              @if(!$class->order_by)
                <td class="text-center">
                  <div class="btn-group" role="group">
                    <a href="{{route('admin.nodes.sort_up', ['id'=>$child->node_id, 'class_id'=>$class->id, 'parent_id'=>$node->id])}}" class="btn btn-sm btn-default" @if($child->orderby <= 1 or !$k) disabled @endif><i class="fa fa-chevron-up"></i></a>
                    <a href="{{route('admin.nodes.sort_down', ['id'=>$child->node_id, 'class_id'=>$class->id, 'parent_id'=>$node->id])}}" class="btn btn-sm btn-default" @if($child->orderby == $children_last_order) disabled @endif><i class="fa fa-chevron-down"></i></a>
                  </div>
                </td>
              @endif
              <td class="text-right">
                {{-- <a href="{{route('admin.nodes.edit', $child->node_id)}}" class="btn btn-sm btn-dark"><i class="fa fa-pencil-square-o"></i> {{trans('admin/nodes.edit')}}</a> --}}
                @if(!Auth::user()->is_limited or $class->limited_users_can_delete)
                  <a href="{{route('admin.nodes.destroy', $child->node_id)}}" class="btn btn-raised btn-sm btn-danger" onclick="if(!confirm('{{trans('admin/nodes.are you sure')}}?')) return false;"><i class="fa fa-trash"></i> {{trans('admin/nodes.remove')}}</a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <div class="alert">
        Розділ порожній
      </div>
    @endif


  </div>
</div>

<div class="p-md" style="padding-top: 0;">
  @if(count($children))
    {!! $children->appends(['class' => $children->first()->class_id])->render() !!}
  @endif
</div>

@endif
