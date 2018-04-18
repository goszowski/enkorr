@if(count($values))
	<p class="analitic-content_title">{{__('Цены в Европе')}} ({{$values->first()->pubdate->format('d.m.y')}})</p>
	<table class="table xs-mt-35">
		<tbody>
			@foreach($values as $value)
				@if($value->has('fuel_type'))
					<tr>
						<td class="price-title">{{ $value->fuel_type->name }}</td>
						<td class="text-left price-value fix-width">
							{{ $value->retail }} 
							@if($oldValues->where('fuel_type_id', $value->fuel_type_id)->first())
								@if($value->retail >= $oldValues->where('fuel_type_id', $value->fuel_type_id)->first()->retail)
									<i class="fa fa-caret-up text-success"></i>
								@else 
									<i class="fa fa-caret-down text-danger"></i>
								@endif
							@endif
						</td>
					</tr>
				@endif
			@endforeach
			
		</tbody>
	</table>
@endif
