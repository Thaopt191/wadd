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
	    	<li>{{ $noti->content }}|<a href="{{URL::to('/noti/delete/'.$noti->id) }}">delete</a> </li>
		@endforeach
	</ul>
	@endif
@stop