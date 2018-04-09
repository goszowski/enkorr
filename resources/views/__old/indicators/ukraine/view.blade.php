@extends('layouts.main')

@include('partials.seo2')

@section('section')
<div class="xs-pt-30">
  <div class="row">
    <div class="col-lg-6">
        <section>
            <h2 class="h4"><b>{{ __('Украина') }} ({{ __('Розница') }})</b></h2>

            @foreach($fuel_types as $fuel_type)
                <section class="xs-pt-30">
                    <h3 class="h4">{{ $fuel_type->name }}</h3>
                    <canvas class="xs-mt-15" id="chart-{{ $fuel_type->node_id }}-retail"></canvas>
                    <script>
                        $(function() {
                            var ctx = $('#chart-{{ $fuel_type->node_id }}-retail');
                            var myChartRetail{{ $fuel_type->node_id }} = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [
                                        @foreach($indicator_values as $date=>$value)
                                            '{{ $date }}',
                                        @endforeach
                                    ],
                                    datasets: [{
                                        label: '{{ __('грн/л') }}',
                                        data: [
                                            @foreach($indicator_values as $date=>$values)
                                                @php($value = $values->where('fuel_type_id', $fuel_type->node_id)->first())
                                                @if($value)
                                                    '{{ $value->retail }}',
                                                @endif
                                            @endforeach
                                        ],
                                        backgroundColor: [
                                            'rgba(235, 92, 36, 0.5)',
                                        ],
                                        borderColor: [
                                            'rgba(235, 92, 36, 0.7)',
                                        ],
                                        borderWidth: 1,
                                        pointRadius: 1,
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    },
                                    legend: {
                                        display: false
                                    }
                                }
                            });
                        });
                    </script>
                </section>
            @endforeach
        </section>
    </div>

    <div class="col-lg-6">
        <section>
            <h2 class="h4"><b>{{ __('Украина') }} ({{ __('Опт') }})</b></h2>

            @foreach($fuel_types as $fuel_type)
                <section class="xs-pt-30">
                    <h3 class="h4">{{ $fuel_type->name }}</h3>
                    <canvas class="xs-mt-15" id="chart-{{ $fuel_type->node_id }}-wholesale"></canvas>
                    <script>
                        $(function() {
                            var ctx = $('#chart-{{ $fuel_type->node_id }}-wholesale');
                            var myChartRetail{{ $fuel_type->node_id }} = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [
                                        @foreach($indicator_values as $date=>$value)
                                            '{{ $date }}',
                                        @endforeach
                                    ],
                                    datasets: [{
                                        label: '{{ __('грн/т') }}',
                                        data: [
                                            @foreach($indicator_values as $date=>$values)
                                                @php($value = $values->where('fuel_type_id', $fuel_type->node_id)->first())
                                                @if($value)
                                                    '{{ $value->wholesale }}',
                                                @endif
                                            @endforeach
                                        ],
                                        backgroundColor: [
                                            'rgba(235, 92, 36, 0.5)',
                                        ],
                                        borderColor: [
                                            'rgba(235, 92, 36, 0.7)',
                                        ],
                                        borderWidth: 1,
                                        pointRadius: 1,
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    },
                                    legend: {
                                        display: false
                                    }
                                }
                            });
                        });
                    </script>
                </section>
            @endforeach

        </section>
    </div>
  </div>
</div>
@endsection
