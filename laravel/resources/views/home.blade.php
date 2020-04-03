@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
              <img src="{{ asset('imgs/users.png') }}" class="card-img-top" height="240px">
              <div class="card-body">
                <a href="{{ url('users') }}" class="btn btn-indigo btn-block">Módulo Usuarios</a>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
              <img src="{{ asset('imgs/categories.png') }}" class="card-img-top" height="240px">
              <div class="card-body">
                <a href="{{ url('categories') }}" class="btn btn-indigo btn-block">Módulo Categorías</a>
              </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
              <img src="{{ asset('imgs/articles.png') }}" class="card-img-top" height="240px">
              <div class="card-body">
                <a href="{{ url('articles') }}" class="btn btn-indigo btn-block">Módulo Artículos</a>
              </div>
            </div>
        </div>
    </div>
</div>

<script>
    function filter(id)
    {
        window.location.href = "{{ URL::action('HomeController@filter') }}" + "/" + id;
    }  
</script>

<div class="container">
  <div class="row justify-content-around">
    <div class="form-group col-md-4">
      <label for="exampleFormControlSelect1">Filtrar por Categorias</label>

      <select onchange="filter(this.value)" class="form-control" id="exampleFormControlSelect1">
        <option value="">Seleccione</option>
        @foreach ($categoriesFil as $category)           
          @if($category->id == Input::get('id'))
            <option selected="selected" value="{{ $category->id }}">{{ $category->name }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
        @endforeach
        <option value="">Todos</option>
      </select> 
    </div>
  </div>
</div>

<div class="container">
  @foreach ($categories as $category)
    <div class="card">   
      <div class="card-body">
        <img src="{{ asset($category->image) }}" class="img-thumbnail" width="80px">
        <label class="text-capitalize font-weight-bold" style="font-size: 1.5rem;">{{ $category->name }}</label>
      </div>
    </div>
    
    <div class="row justify-content-around">
      @foreach ($articles as $article)
        @if($category->id == $article->category_id)          
          <div class="card" style="width: 10rem;">
            <img class="card-img-top" src="{{ asset($article->image) }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ $article->name }}</h5>
              <p class="card-text">{{ $article->description }}</p>
              <a href="{{ url('articles/'.$article->id) }}" class="btn btn-indigo btn-sm">
                <i class="fa fa-eye"></i>
              </a>
            </div>
          </div>
        @endif            
      @endforeach
    </div>
  @endforeach
</div>
@endsection
