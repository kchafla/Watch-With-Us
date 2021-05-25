@extends('errors.layout')

@php
  $error_number = 401;
@endphp

@section('title')
  Acción no autorizada.
@endsection

@section('description')
  @php
    $default_error_message = "Por favor <a href='javascript:history.back()''>regrese</a> o regresa a la<a href='".url('')."'> página principal</a>.";
  @endphp
  {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
@endsection