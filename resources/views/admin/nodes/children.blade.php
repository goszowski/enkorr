@if($showChildren)

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
              <th class="text-right">{{trans('admin/nodes.action')}}</th>
            </tr>
          </thead>
          <tbody>
            @foreach($children as $child)
            <tr>
              <?php
                $locale = Locale::getDefByNode($child->id);
              ?>
              @foreach($fields as $field)
              <td>
                @include('admin.nodes.partials.visualization.'.$field->type->input_controller, ['value'=> $locale ? $locale->{$field->shortname} : '---'])
              </td>
              @endforeach

              <td class="text-right">
                <a href="{{route('admin.nodes.edit', $child->id)}}" class="btn btn-sm btn-dark"><i class="fa fa-pencil-square-o"></i> {{trans('admin/nodes.edit')}}</a>
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
