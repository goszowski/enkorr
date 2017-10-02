@if(isset($quiz))
  <div class="form-group poll xs-pl-10 xs-pr-15 xs-pt-15 xs-pb-15">
      <h3 class="xs-pb-15">{{$quiz->name}}</h3>
      {{Form::open(['route' => 'quizAnswer', 'method' => 'post'])}}

          <input hidden name="quiz" value="{{$quiz->node_id}}">
          @if(count($answers))
            @foreach($answers as $k => $option)
              <div class="checkbox ripple" data-color="#ccc">
                  <input type="radio" name="option" id="variant-{{$k}}" value="{{$option->node_id}}">
                  <label for="variant-{{$k}}">{{$option->name}}</label>
              </div>
            @endforeach
          @endif

          <button class="btn btn-primary btn-block">Голосовать</button>
      {{Form::close()}}
  </div>
@endif
