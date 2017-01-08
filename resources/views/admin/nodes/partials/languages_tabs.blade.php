<ul class="nav nav-sm nav-tabs lang-tabs">
  @foreach($languages as $lk=>$lang)
    <li role="presentation" @if( (Session::has('active_lang') and session('active_lang') == $lang->id)) class="active" @elseif(! Session::has('active_lang') and $lang->locale == LaravelLocalization::getCurrentLocale()) class="active" @endif>
      <a data-toggle="tab" data-lang="{{$lang->id}}" href="#lang-tab-{{$lang->id}}">{{$lang->name}}</a>
    </li>
  @endforeach


</ul>



<input type="hidden" name="active_lang_id" @if(Session::has('active_lang')) value="{{session('active_lang')}}" @else value="{{\App\Runsite\Languages::where('is_default', true)->first()->id}}" @endif>
