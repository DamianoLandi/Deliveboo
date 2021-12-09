@extends('layouts.app')
@section('content')
@if (!$restaurant)
    <h2 class="text-center text-danger">Non hai ancora inserito un ristorante</h2>
@else
@include('includes.form')
@endif

@endsection