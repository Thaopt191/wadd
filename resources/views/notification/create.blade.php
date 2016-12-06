<?php
// Start the session
session_start();
?>

@extends('templates.template')
 
@section('content')
	{!! Form::open() !!}
		{!! Form::label('id_khoa', 'Chon khoa')!!}</br>
		{!! Form::select('id_khoa', ['CNNT' => '1', 'DTVT' => '2'], 'CNTT') !!}</br>
		
 		{!! Form::label('content', 'Description')!!}</br>
 		{!! Form::text('content')!!}</br>
		{!! Form::submit('Them moi')!!}
	{!! Form::close() !!}
@stop