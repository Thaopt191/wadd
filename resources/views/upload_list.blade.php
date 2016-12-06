<?php
// Start the session
session_start();
?>

@extends('templates.template')
@section('content')
	@if($type == 1)
		@if ($list == null)
			<p>Chưa có sinh viên nộp hồ sơ</p>
		@else
			<ul class="up-list">
				@foreach ($list as $key=>$i)
			    	<li>{{ $user[$key]->ten_rieng }} | <a href="{{URL::to('/regis/accept/'.$i->id) }}">accept</a></li>
				@endforeach
			</ul>
		@endif
	@elseif($type==2)
		@if ($list != null)
			<p>Tất cả sinh viên đã nộp hồ sơ</p>
		@else
			<ul class="up-list">
				@foreach ($list as $key=>$i)
			    	<li>{{ $user[$key]->ten_rieng }} | <a href="{{URL::to('/regis/sendmail/'.$i->id) }}">Send Email</a></li>
				@endforeach
			</ul>
		@endif
	@elseif($type==3)
		@if ($list == null)
			<p>Tất cả sinh viên đã nộp hồ sơ</p>
		@else
			<ul class="up-list">
				@foreach ($list as $key=>$i)
			    	<li>{{ $user[$key]->ten_rieng }}</li>
				@endforeach
				<button type="button" class="btn btn-primary">Default</button>
			</ul>
		@endif
	@endif
@stop
