@if($breadcrumb)
<ol class="breadcrumb" style=" padding: 0;">
  @foreach($breadcrumb as $bk=>$bitem)
    @if($bk < count($breadcrumb)-1)
      <li><a href="{{route('admin.nodes.edit', $bitem)}}" class="text-xs text-dark">@if(!$bk)<i class="fa fa-home"></i>@endif {{\App\Runsite\Libraries\Locale::getDefByNode($bitem)->name}}</a></li>
    @else
      <li class="active text-xs">{{\App\Runsite\Libraries\Locale::getDefByNode($bitem)->name}} [id {{$bitem}}]</li>
    @endif
  @endforeach
</ol>
@endif
