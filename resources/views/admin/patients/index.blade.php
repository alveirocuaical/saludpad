@extends('layout')

@section('title','Saludpad | pacientes')
@section('content')
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-start">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Numero documento</th>
                    <th scope="col">Nombres y apellidos</th>
                    
                   
                  </tr>
                </thead>
                <tbody>
                    @forelse ($pacientes as $paciente)
                        <tr>
                            <td>{{ $paciente->num_id }}</td>
                            <td>{{ $paciente->nombres }}</td>                           
                        </tr> 
                    @empty
                    <tr>
                        <th scope="row">Ningun paciente encontrado.</th>                       
                    </tr>
                    @endforelse
                                
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">{{ $pacientes->links() }}</div>   
@endsection