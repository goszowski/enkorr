@if(!$text->excel_table_data)
  @php($text->excel_table_read())
@endif
<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			@foreach($text->excel_table_data as $k=>$columns)
				@if(!$k)
					<tr>
						@foreach($columns as $column)
							<th>{{ $column }}</th>
						@endforeach
					</tr>
				@endif
			@endforeach
		</thead>
		<tbody>
			@foreach($text->excel_table_data as $k=>$columns)
				@if($k)
					<tr>
						@foreach($columns as $column)
							<td>{{ $column }}</td>
						@endforeach
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>