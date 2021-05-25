@extends('errors.layout')

@php
  $error_number = 503;
@endphp

@section('title')
  No eres tu, soy yo.
@endsection

@section('description')
  @php
    $default_error_message = "El servidor está sobrecargado o inactivo por mantenimiento. Por favor, inténtelo de nuevo más tarde.";
  @endphp
  {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
@endsection
