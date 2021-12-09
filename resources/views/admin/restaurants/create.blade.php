@extends('layouts.app')

@section('content')

@if($restaurant)

    @include('includes.alert_restaurant')


@else
<h2 class="text-success mt-5 text-center" > Crea il Tuo Ristorante!</h2>
<div class="container">
    <form class="w-75 mx-auto mt-5 text-center" method="POST" action="{{ route('admin.restaurants.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome Ristorante</label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="logo">URL Logo</label>
            <input class="form-control" type="text" name="logo" id="logo">
        </div>
        <div class="form-group">
            <label for="address">Indirizzo</label>
            <input class="form-control" type="text" name="address" id="address">
        </div>
        <div class="form-group">
            <label for="vat_number">PIVA</label>
            <input class="form-control" type="text" name="vat_number" id="vat_number">
        </div>
        <div class="form-group">
            <label for="phone">Numero di Telefono</label>
            <input class="form-control" type="text" name="phone" id="phone">
        </div>
        <div class="form-group">
            <label for="hours">Orari</label>
            <input class="form-control" type="text" name="hours" id="hours">
        </div>
        <div>
            <h2>Tipologie Ristorante</h2>
            <div>
                @foreach($types as $type)
                    <label for="type-{{$loop->iteration}}">{{$type->name}}</label>
                    <input type="checkbox" name="types[]" value="{{$type->id}}" id="'type-{{$loop->iteration}}">
                @endforeach
            </div>
        </div>

        <div class="my-2 d-flex justify-content-center">
            <a class='btn btn-outline-secondary mx-4' href="{{route('admin.restaurants.index')}}">Indietro</a>
            <button class='btn btn-success mx-4' type="submit">Crea</button>
       </div>
    </form>
</div>
    @endif
@endsection