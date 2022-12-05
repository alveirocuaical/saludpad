@extends('layout')

@section('title','Saludpad | usuarios')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="display-5 mb-0">Usuarios</h1>
            </div>
            
            @can('view-document-admin-index')
                <a class="btn btn-primary mb-0" href="{{ route('admin-users.create') }}">
                    Crear usuario
                </a>
            @endcan
        </div>
        <hr>
        <div class="d-flex flex-wrap justify-content-between align-items-start table-responsive">
            
            
            <table class="table  table-hover">
                <thead>
                  <tr>
                    <th scope="col">Identificacion</th>
                    <th scope="col">Nombres y apellidos</th>
                    <th scope="col">Email</th>
                                     
                    <th scope="col">Opciones</th>                   
                  </tr>
                </thead>
                <tbody>
                    @forelse ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id_usuario }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            
                            <td>
                                <div class="d-flex justify-content-between align-items-center ">
                                               
                                    @auth
                                       <div class="btn-group btn-group-sm "> 
                                          @can('update', $usuario)
                                             <a class="btn btn-primary" href="{{ route('admin-users.edit',$usuario) }}">Editar</a>
                                          @endcan
                  
                                          @can('destroy',$usuario)
                                        
                                            <form action="{{ route('admin-users.destroy', $usuario) }}"
                                                method="POST"  
                                                class="d-inline"
                                                onsubmit="return confirm('Esta accion no se puede deshacer, ¿está seguro de querer eliminar el usuario?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                          @endcan                      
                                       </div> 
                                                   
                                    @endauth
                                 </div>
                            </td> 
                                                                             
                        </tr> 
                    @empty
                    <tr>
                        <th scope="row">Ningun usuario encontrado.</th>                       
                    </tr>
                    @endforelse
                                
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">{{ $usuarios->links() }}</div>   
@endsection