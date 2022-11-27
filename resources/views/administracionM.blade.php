@extends('layouts.general')


@section('contenido')
@php
switch ($C) {
    case 'A':
        $COMP = 'components.admin';
        break;

    default:
        # code...
        break;
}
@endphp

@include($COMP)

@endsection
