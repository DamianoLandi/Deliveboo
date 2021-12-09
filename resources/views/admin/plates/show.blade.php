@extends('layouts.app')

@section('content')


<div class="container mt-5">
        <div class="row plate-card-show">
            <div class="col-12 col-md-6 text-center text-lg-start d-flex justify-content-center align-items-center my-5 my-md-0 plate-img-container">
                <img src="{{asset('storage/'.$plate->image)}}" alt="{{$plate->name}}">
            </div>
            <div class="col-12 col-md-6">
                <h2 class="text-white mt-3 mb-5 restaurant-title text-center" > {{$plate->name}}</h2>
                <ul class="text-white plate-info ">
                    <li class="plate-description">{{$plate->description}}</li>
                    <li><i class="fas fa-drumstick-bite"></i> Portata: <b>{{$plate->serving}}</b></li>
                    <li><i class="fas fa-money-bill-wave"></i> Prezzo: <b>{{$plate->price}} &euro;</b></li>
                    <li><i class="fas fa-list-ul"></i> Categorie: <b>
                    @forelse ($plate->categories as $category)
                        <span class="badge" style="background-color: {{$category->color}}">{{$category->name}} </span>
                    @empty
                        Nessuna
                    @endforelse </b></li>
                </ul>
            </div>
        </div>
    </div>    
    <div class="container d-flex justify-content-center mt-5">
      <a href="{{ route('admin.plates.index')}}"><button class="btn btn-primary" type="submit" value="Torna alla lista">Torna ai tuoi piatti</button></a>
      <a href="{{route('admin.plates.edit', $plate->id)}}" class="btn btn-warning ml-2">Modifica</a>
        <form action="{{route('admin.plates.destroy', $plate->id)}}" method="post" class="delete-button">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger ml-2">Elimina</button>
        </form>
    </div>      
    @endsection

