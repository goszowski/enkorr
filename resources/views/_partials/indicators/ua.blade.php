@if(count($values))

@endif
<p class="analitic-content_title">{{ __('Цены в Украине') }} ({{ $values->first()->pubdate->format('d.m.y') }})</p>
<table class="table">
	<thead>
		<tr>
			<th></th>
			<th class="field-name">{{ __('Опт, грн/т') }}</th>
			<th class="field-name">{{ __('Розница, грн/л') }}</th>
		</tr>
	</thead>
	<tbody>
		@foreach($values as $value)
			@if($value->has('fuel_type'))
				<tr>
					<td class="price-title">{{ $value->fuel_type->name }}</td>
					<td class="price-value fa-style">
						{{ $value->wholesale }}
						@if($oldValues->where('fuel_type_id', $value->fuel_type_id)->first())
							@if($value->wholesale >= $oldValues->where('fuel_type_id', $value->fuel_type_id)->first()->wholesale)
								<i class="fa fa-caret-up text-success"></i>
							@else 
								<i class="fa fa-caret-down text-danger"></i>
							@endif
						@endif
					</td>
					<td class="text-left price-value fa-style">
						{{$value->retail}} 
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
