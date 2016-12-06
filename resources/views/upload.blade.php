<?php
// Start the session
session_start();
?>

@extends('templates.template')
@section('content')
	{!! Form::open(
    array(
        'class' => 'form', 
        'files' => true)) !!}
	<div class="form-group">
	    {!! Form::label("upload",'Chọn file hồ sơ để upload!') !!}</br>
	    {!! Form::file('upload_file', null) !!}

	</div>
		<input type="hidden" name="id" value="{{ $tk->id }}">
		<input type="hidden" name="detai" value="{{ $sv->id_de_tai }}">
	<div class="form-group">
	    {!! Form::submit('Upload!') !!}
	</div>
	{!! Form::close() !!}
	</div>

@stop
