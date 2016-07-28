<div class="app-header navbar bg-dark">
  <nav class="navbar">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->

      <div class="navbar collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

          @if(isset($node))

            <li @if(\Request::route()->getName() == 'admin.nodes.edit') class="active" @endif>
              <a href="{{route('admin.nodes.edit', $node->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{trans('admin/nodes.edit')}}</a>
            </li>
          @endif

          @if((isset($dependencies) and count($dependencies)) or (isset($NodeDependencies) and count($NodeDependencies)))
          <li class="dropdown">
            <a href="javascript:;" data-toggle="dropdown"><i class="fa fa-plus"></i> {{trans('admin/nodes.create')}}</a>
            <ul class="dropdown-menu">
              @foreach($NodeDependencies as $item)
              <li><a href="{{route('admin.nodes.create', [$item->classes->id, $node->id])}}">{{$item->classes->name_create}}</a></li>
              @endforeach
              @foreach($dependencies as $item)
              <li><a href="{{route('admin.nodes.create', [$item->classes->id, $node->id])}}">{{$item->classes->name_create}}</a></li>
              @endforeach
            </ul>
          </li>
          @endif

          @if(isset($node) and !isset($parent) and !Auth::user()->is_limited)
          <li @if(\Request::route()->getName() == 'admin.nodes.settings') class="active" @endif>
            <a href="{{route('admin.nodes.settings', $node->id)}}"><i class="fa fa-cog"></i> {{trans('admin/nodes.settings')}}</a>
          </li>

          {{-- <li @if(\Request::route()->getName() == 'admin.nodes.access') class="active" @endif>
            <a href="{{route('admin.nodes.edit', $node->id)}}"><i class="fa fa-users"></i> {{trans('admin/nodes.access')}}</a>
          </li> --}}

          <li @if(\Request::route()->getName() == 'admin.nodes.dependencies') class="active" @endif>
            <a href="{{route('admin.nodes.dependencies', $node->id)}}"><i class="fa fa-sitemap"></i> {{trans('admin/nodes.dependencies')}}</a>
          </li>
          @endif

        </ul>
      </div><!-- /.navbar-collapse -->
  </nav>
</div>

<script type="text/javascript">
  $(function() {
    $('.verification-form').on('submit', function() {
      $('.group-tabs li span.label').html('');
      var errorsExists = false;
      var errorsCount = [];
      $(this).find('.required').each(function() {
        var object = $(this);
        object.parent().removeClass('has-error');
        var thisValue = object.val();
        var dataGroup = object.data('group');
        var dataLang = object.data('lang');
        var label = $('[data-info="group-'+dataGroup+'-lang-'+dataLang+'"]').find('.label');
        //label.html('');

        if(! thisValue) {

          if(dataLang == 1) {


            //console.log(label.html());
            //var dataCount = label.data('count');
            if(errorsCount[dataGroup] == undefined)
              errorsCount[dataGroup] = 0;
            errorsCount[dataGroup] += 1;
            label.html(errorsCount[dataGroup]);
            object.parent().addClass('has-error');
            errorsExists = true;
          }

          //alert('not value in ' + dataLang + ' of lang, and group is ' + dataGroup);
        }
      });

      if(errorsExists) {
        return false;
      }
    });


    $('.group-tabs li a').on('click', function() {
      $('[name="active_group_id"]').val($(this).data('group'));
    });

    $('.lang-tabs li a').on('click', function() {
      $('[name="active_lang_id"]').val($(this).data('lang'));
    });
  });
</script>
