@extends('errors.layout')

@php
	$error_number = 500;
@endphp

@section('title')
	No eres tu, soy yo.
@endsection

@section('description')
	@php
	  $default_error_message = "Ha ocurrido un error interno del servidor. Si el error persiste, comuníquese con el equipo de desarrollo.";
	@endphp
	{!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
@endsection