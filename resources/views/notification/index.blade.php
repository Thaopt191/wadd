<?php
// Start the session
session_start();
?>

@extends('templates.template')
@section('content')
	@if ($notis == null)
		<p>Khong co thong bao</p>
	@else
	<ul class="noti">
		@foreach ($notis as $noti)
	    	<li>{{ $noti->content }}</li>
		@endforeach
	</ul>
	@endif
@stop
