@if(!$text->chartData)
  @php($text->chart())
@endif

<canvas class="publication-chart" id="chart-{{ $text->node_id }}"></canvas>
{{-- {{ dd($text->chart()->data) }} --}}
<script>
  $(function() {
    var ctx = $('#chart-{{ $text->node_id }}');


    var myChart{{ $text->node_id }} = new Chart(ctx, {
        type: '{{ $text->chart_type->system_name }}',


        data: {
            labels: [
              @foreach($text->chartData as $k=>$column)
                @if($k)
                  '{{ $column[1] }}',
                @endif
              @endforeach
            ],
            datasets: [

              @foreach($text->chartData[0] as $k=>$column)
                @if($k>1)
                  {
                    label: '{{ $column }}',
                    data: [
                      @foreach($text->chartData as $key=>$item)
                        @if($key)
                          '{{ $item[$k] }}',
                        @endif
                        
                      @endforeach
                    ],
                    backgroundColor: [
                      @foreach($text->chartColours as $color)
                        '{{ $color }}',
                      @endforeach
                    ],
                    borderColor: [
                      @foreach($text->chartBorderColours as $color)
                        '{{ $color }}',
                      @endforeach
                    ],
                    borderWidth: 1
                  },
                @endif
              @endforeach

            
            ]

        },


    });
  });
</script>