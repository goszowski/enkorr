@if(isset($poll) and $poll)
  <div class="form-group poll xs-pl-10 xs-pr-15 xs-pt-15 xs-pb-15">
    @if($poll->ipAnswer)
        <h3 class="xs-pb-15">{{$poll->name}}</h3>
        {{Form::open(['route' => 'pollAnswer', 'method' => 'post'])}}

        <input hidden name="poll" value="{{$poll->node_id}}">
        @if(count($answers))
          @foreach($answers as $k => $option)
            <div class="checkbox ripple" data-color="#ccc">
              <input type="radio" name="option" id="variant-{{$k}}" value="{{$option->node_id}}">
              <label for="variant-{{$k}}">{{$option->name}}</label>
            </div>
          @endforeach
        @endif

        <button id="poll-button" class="btn btn-primary btn-block">{{__('Голосовать')}}</button>
        {{Form::close()}}
    @else
        <a href="{{lPath($poll->node->absolute_path)}}">
          <h3 class="xs-pb-15">{{$poll->name}}</h3>
        </a>
          @foreach ($answers as $answer)
            <p>
              {{$answer->name}}
            </p>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="{{$answer->count}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$answer->count}}%">
                {{$answer->count.'%'}}
              </div>
            </div>
          @endforeach
    @endif
    <br />
    <a href="{{lPath('polls')}}" class="btn btn-primary btn-block" role="button">{{__('Все опросы')}}</a>
  </div>
@endif
