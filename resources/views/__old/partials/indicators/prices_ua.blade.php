@if(count($values))
<div class="form-group">
	<div class="indicator">
		<table class="table">
			<thead>
				<tr>
					<th colspan="3"><small>{{__('Цены в Украине')}} ({{$values->first()->pubdate->format('d.m.y')}})</small></th>
				</tr>
				<tr>
					<th colspan="2" class="text-right"><small>{{__('Опт, грн/т')}}</small></th>
					<th class="text-right"><small>{{__('Розница, грн/л')}}</small></th>
				</tr>
			</thead>
			<tbody>
				@foreach($values as $value)
					@if($value->has('fuel_type'))
						<tr>
							<td><small class="text-primary"><b>{{$value->fuel_type->name}}</b></small></td>
							<td class="text-right"><small>
								{{$value->wholesale}}
								@if($oldValues->where('fuel_type_id', $value->fuel_type_id)->first())
									@if($value->wholesale >= $oldValues->where('fuel_type_id', $value->fuel_type_id)->first()->wholesale)
										<i class="fa fa-arrow-up text-success"></i>
									@else 
										<i class="fa fa-arrow-down text-danger"></i>
									@endif
								@endif
								
							</small></td>
							<td class="text-right"><small>
								{{$value->retail}}
								@if($oldValues->where('fuel_type_id', $value->fuel_type_id)->first())
									@if($value->retail >= $oldValues->where('fuel_type_id', $value->fuel_type_id)->first()->retail)
										<i class="fa fa-arrow-up text-success"></i>
									@else 
										<i class="fa fa-arrow-down text-danger"></i>
									@endif
								@endif
							</small></td>
						</tr>
					@endif
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endif
