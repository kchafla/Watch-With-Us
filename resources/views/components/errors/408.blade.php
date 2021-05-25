@extends('errors.layout')

@php
  $error_number = 408;
@endphp

@section('title')
  Solicitud agotada.
@endsection

@section('description')
  @php
    $default_error_message = "Por favor <a href='javascript:history.back()''>regrese</a>, actualiza la página y vuelve a intentarlo</a>.";

  @endphp
  {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
@endsection