@extends('layouts.app')

@section('content')

    @if($restaurant)

    <div class="container mt-5 px-5">
        <div class="row restaurant-card flex-wrap pb-5 pb-lg-0">
            <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center text-center text-lg-start my-5 my-lg-0 restaurant-img-container">
                <img src="{{$restaurant->logo}}" alt="{{$restaurant->name}}">
            </div>
            <div class="col-12 col-lg-8 restaurant-info-container">
            <h2 class="text-white mt-3 mb-5 text-center restaurant-title" > {{$restaurant->name}}</h2>
            <ul class="text-white restaurant-info pt-4">
                    <li>
                        <strong><i class="fab fa-slack-hash"></i> ID</strong>: {{$restaurant->id}}
                    </li>
                    <li>
                        <strong><i class="fas fa-map-marker-alt"></i> Indirizzo</strong>: {{$restaurant->address}}
                    </li>
                    <li>
                        <strong><i class="fas fa-phone-alt"></i> Numero di Telefono</strong>: {{$restaurant->phone}}
                    </li>
                    <li>
                        <strong><i class="fas fa-clock"></i> Orario di Apertura</strong>: {{$restaurant->hours}}
                    </li>
                    <li>
                        <strong><i class="fas fa-list-ul"></i> Tipologie</strong>:                         
                        @forelse($restaurant->types as $type)
                            {{ $type->name }}
                        @empty
                            Nessuna Tipologia
                        @endforelse
                    </li>
                </ul>
            </div>
        </div>
        <hr class="bot">
    </div>

    @else
    <h2 class="text-secondary mt-5 text-center" > Non c'è un ristorante associato al tuo profilo</h2>
    <div class="d-flex justify-content-center">
        <a class="btn btn-warning my-5" href="{{ route('admin.restaurants.create') }}">Crea il Tuo Ristorante!</a>
    </div>
        
    @endif
@endsection