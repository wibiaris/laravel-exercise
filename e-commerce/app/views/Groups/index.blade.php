@extends("Groups.layout")
@section("content")
	@if(count($groups))
		<table>
			<tr>
				<th>name</th>
			</tr>
			@foreach($groups as $group)
			<tr>
				<td>{{ $group->name }}</td>
			</tr>
			@endforeach
		</table>
	@else
		<p>There are no groups.</p>
	@endif
	<a href="{{	URL:route("group/add")}}"> add group</a>
	@stop	