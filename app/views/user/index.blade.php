@extends('layouts.default')
@section('content')

<div class="qa-main">
	<h1>Top scoring users </h1>
	<div class="qa-part-ranking">
		<table class="qa-top-users-table">
			{{$html}}
		</table>
	</div>

</div>

@stop
