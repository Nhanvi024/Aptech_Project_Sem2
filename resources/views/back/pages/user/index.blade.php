@extends("back.layouts.pages-layout")
@section("pageTitle", isset($pageTitle) ? $pageTitle : "Welcome to my site")
@section("content")
	<h1>USER TABLE</h1>
	<table class="table table-striped">
		<thead>
			<tr>

				<th>id</th>
				<th>name</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $item)
				<tr>
					<td>{{ $item->id }}</td>
					<td>{{ $item->username }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
