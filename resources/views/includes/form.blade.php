@extends('layouts.app')
@section('content')

<section id="form" class="container">
  <div class="box mt-5">
  @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <ul>
              <li>{{$error}}</li>
            </ul>
        @endforeach
    </div>
@endif
    
    @if ($plate->id)
        <h1 class="text-center text-white mt-3 font-weight-bold">Modifica Piatto</h1>
        <form class="w-75 mt-3 mx-auto" method="POST" action="{{route('admin.plates.update',$plate->id)}}" enctype="multipart/form-data">
        @method('PATCH')
    @else
       <h1 class="text-white mt-3 text-center">Crea Piatto</h1>
       <form class="w-75 mx-auto" method="POST" action="{{route('admin.plates.store')}}" enctype="multipart/form-data">

    @endif
        @csrf
       <div class="form-group">
         <label for="name">Nome del piatto</label>
         <input type="text" class="form-control" id="name" name='name' placeholder="Inserisci il nome del piatto" value="{{$plate->name}}">
       </div>
       <div class="form-group">
          <label for="image">Immagine</label>
          <input type="file" class="form-control" id="image" name='image' value="{{old('image',$plate->image)}}">
        </div>
        
        <div class="form-group">
          <label for="Description">Descrizione</label>
          <textarea class="form-control" id="Description" name="description" >{{$plate->description}}</textarea>
        </div>
        <div class="form-group">
          <label for="price">Prezzo</label>
          <input type="text" class="form-control" id="price" name='price' placeholder="Inserisci il prezzo del piatto" value="{{$plate->price}}">
        </div>
        <div class="form-group">
          <label for="serving">Portata</label>
          <select class="form-control" id="serving" name="serving">
            <option @if ($plate->serving == 'ANT') selected @endif value="ANT">ANT</option>
            <option @if ($plate->serving == 'PRI') selected @endif value="PRI">PRI</option>
            <option @if ($plate->serving == 'SEC') selected @endif value="SEC">SEC</option>
            <option @if ($plate->serving == 'DOL') selected @endif value="DOL">DOL</option>
          </select>
        </div>  

        <div class="my-2">
          <h5>Disponibilità</h5>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_available" id="availability" value="true" @if($plate->is_available == 1) ? checked @endif>
            <label class="form-check-label" for="availability">Disponibile</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="is_available" id="availability" value="false" @if($plate->is_available == 0) ? checked @endif>
            <label class="form-check-label" for="availability">Non disponibile</label>
          </div>
        </div>
        <h5>Categoria</h5>
        @foreach ($categories as $category) 
          <div class="form-check form-check-inline">
             <input class="form-check-input" type="checkbox" id="{{$category->id}}" value="{{$category->id}}" name="categories[]" @if(in_array($category->id , old('category', $categoriesIds ?? []))) checked @endif>
             <label class="form-check-label" for="{{$category->id}}" >{{$category->name}}</label>
          </div>   
       @endforeach
       </div>
       <div class="mt-5 d-flex justify-content-center">
         <a class='btn btn-primary mx-3' href="{{route('admin.plates.index')}}">Indietro</a>
         <button class='btn btn-success'type="submit">Salva</button>
       </div>
      </form>
   </section>   
@endsection