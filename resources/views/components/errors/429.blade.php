@extends('errors.layout')

@php
  $error_number = 429;
@endphp

@section('title')
  Demasiadas solicitudes.
@endsection

@section('description')
  @php
  $default_error_message = "Por favor <a href='javascript:history.back()''>regrese</a> y vuelve a intentarlo, o regresa a la<a href='".url('')."'> página principal</a>.";
  @endphp
  {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
@endsection