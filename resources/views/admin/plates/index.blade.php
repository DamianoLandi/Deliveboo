@extends('layouts.app')
@section('content')

<div class="container  ">
    @if (!$restaurant)
        <h2 class="text-center text-danger">Inserisci prima un ristorante</h2>
    @else
        <h1 class="text-success text-center font-weight-bold" > I Tuoi Piatti</h1>
        <div class="bottone btn-success d-flex justify-content-center align-items-center ml-md-4 ml-lg-0">
        <a class="p-3" href="{{route('admin.plates.create')}}">+</a></div>
        <div class="box d-flex justify-content-around flex-wrap">

        @forelse ($plates as $plate)
            <div class="card mx-1 my-4 plate-card" style="width: 18rem;">
                <img src="{{asset('storage/'.$plate->image)}}" alt="{{$plate->name}}" class="card-img-top card-img-custom">
                <div class="card-body text-center">
                    <h5 class="card-title">{{$plate->name}}</h5>
                    <ul class="plates-card-list">
                        <li>
                            <strong>Portata</strong>: {{$plate->serving}}
                        </li>
                        <li>
                            <strong>Prezzo</strong>: {{$plate->price}}&euro;
                        </li>
                        <li>
                            <strong>Categorie</strong>: 

                            @forelse ($plate->categories as $category)
                             <span class="badge" style="background-color: {{$category->color}}">{{$category->name}}</span>
                            @empty
                            Nessuna 
                            @endforelse
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="{{route('admin.plates.show', $plate->id)}}" class="btn btn-primary ml-2">Vedi</a>
                        <a href="{{route('admin.plates.edit', $plate->id)}}" class="btn btn-warning ml-2">Modifica</a>
                        <form action="{{route('admin.plates.destroy', $plate->id)}}" method="post" class="delete-button">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ml-2">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>

        @empty
            <p class="text-secondary text-center my-3">Non ci sono piatti da visualizzare</p>        
        @endforelse
        </div>
        
        <div class="d-flex mt-5 justify-content-center">{{$plates->links()}}</div>
    @endif
    
@endsection