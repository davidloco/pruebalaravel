@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <table class="table table-inverse table-striped table-bordered">
            <thead>
              <tr>
                <th>Nombre Completo</th>
                <th>Correo Electronico</th>
                <th>Foto</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <td>{{ $user->fullname}}</td>
                  <td>{{ $user->email}}</td>
                  <td><img src="{{ asset($user->photo) }}" width="40px"></img></td>
                  <td>
                    <a href="" class="btn btn-indigo btn-sm">
                      <i class="fa fa-search"></i>
                    </a> 
                    <a href="" class="btn btn-indigo btn-sm">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <a href="" class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>            
            <tfoot>
              <tr>
                <td colspan="4">
                  {{$users->links()}}
                </td>
              </tr>
            </tfoot>
          </table>

        </div>
    </div>
</div>
@endsection
