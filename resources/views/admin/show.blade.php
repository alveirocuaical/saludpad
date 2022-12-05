@extends('layout')

@section('title','Saludpad | Administrador')
@section('content')

    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>               
                <h1 class="display-5 mb-0">{{ 'Documentos '.$titulo }}</h1> 
            </div>
                  
        </div>
        <p class="lead text-secondary">Limpie la carpeta cuando haya descargado sus archivos!</p> 
        <hr> 
        
        <div class="d-flex flex-wrap justify-content-center align-items-center float-center ">
            <div class="col-12 ">
               
                <ul class="list-group">
                    @forelse ($documentos as $documento)
                        <li class="list-group-item">
                           
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"> {{  $documento->nombre }}</h5>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($documento->created_at)->diffForHUmans(); }}</small>
                               
                            </div>
                            
                            <p class="mb-1">{{ 'Id paciente: ' .$documento->id_paciente }}</p>
                            <a href="{{ url('docuno/'.$titulo.'/'.$documento->documento) }}">{{ $documento->documento }}</a>
                        </li>
                    @empty
                        <ul class="list-group">
                            <li class="list-group-item">
                                Ningun documento encotrado.
                            </li>
                        </ul>
                    @endforelse               
                </ul> 
                <div class="d-flex flex-wrap justify-content-between align-items-center float-center">
                    <a href="{{ url('docs/'.$titulo) }}">
                        <button class="btn btn-secondary mt-3" id="final_sub">Descargar todos</button>
                    </a>
                    
                    <form action="{{ route('admin.destroy', $titulo) }}"
                    method="POST"  
                    class="d-inline"
                    onsubmit="return confirm('Esta accion no se puede deshacer, verifique que ha descargado todos los documentos. \n\n ¿está seguro de querer eliminar los archivos de la carpeta?')">
                    @csrf @method('DELETE')

                        <button class="btn btn-sm btn-danger">Eliminar permanentemente</button>
                    </form>

                </div >
               
                
            </div>
              
        </div>
        <div class="mt-4">{{ $documentos->links() }}</div> 
    </div>  
    
    <script>
       
    </script>
@endsection