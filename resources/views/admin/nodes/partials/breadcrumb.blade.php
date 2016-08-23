@if($breadcrumb)
<ol class="breadcrumb" style=" padding: 0;">
  @foreach($breadcrumb as $bk=>$bitem)
    @if($bk < count($breadcrumb)-1)
      <li><a href="{{route('admin.nodes.edit', $bitem)}}" class="text-xs text-dark">@if(!$bk)<i class="fa fa-home"></i>@endif {{\App\Runsite\Libraries\Locale::getDefByNode($bitem)->name}}</a></li>
    @else
      <li class="active text-xs">{{@\App\Runsite\Libraries\Locale::getDefByNode($bitem)->name}}
        @if(! \Auth::user()->is_limited)
          [id {{$bitem}}]
        @endif
      </li>
    @endif
  @endforeach

  @if(! \Auth::user()->is_limited)
    <li>
      <a href="{{route('admin.classes.edit', $node->class_id)}}" class="label bg-success">{{$node->_class->name}} : {{$node->_class->shortname}}</a>
    </li>
  @endif
</ol>
@endif
