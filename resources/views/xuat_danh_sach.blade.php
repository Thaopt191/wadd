<?php
// Start the session
session_start();
?>

@extends('templates.template')
@section('content')
	<a href="{{action("Document@ExportStudent")}}">Xuất danh sách</a>
@stop