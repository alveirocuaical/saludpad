@extends('layout')

@section('title','Saludpad | Documentos')
@section('content')

    <div class="container"  >
        <div class="div container">        
            <div class="row">            
                <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                    <h1 class="display-5">Subir documento</h1> 
                    <hr>
                    @include('partials.validations_errors') 
                    <form id="docs" class="bg-white shadow rounded py-3 px-4" action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf                  
                         
                        <div class="form-group">
                            <label for="servicio">Tipo de servicio</label>
                            <select 
                                name="servicio"
                                id="servicio"
                                class="form-control shadow-sm servicio"
                                >
                                <option value="">Seleccione</option>
                                <option value="1">Fisioterapia</option>
                                <option value="2">Enfermeria</option>
                                <option value="3">Curaciones</option>
                                <option value="4">Terapia respiratoria</option>
                                <option value="5">Terapia ocupacional</option>
                                <option value="6">Fonoaudiologia</option>
                                <option value="7">Consulta medica</option>
                                <option value="8">Cuentas de Cobro</option>
                                <option value="9">Hoja de Vida</option>
                                <option value="10">Regstro de firmas</option>
                                <option value="11">Medicamentos</option>
                                <option value="12">Procedimientos</option>
                                <option value="13">Evaluaciones</option>
                            </select>
                        </div>
                        <div id="ocultos">
                            <div class="form-group">                        
                            
                                <div class="form-group">
                                    <label for="id">Id profesional</label>
                                    <input id="id" type="number" name="id_medico" class="form-control shadow-sm" value="{{ old('id_medico') }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="nombre">Nombre profesional</label>        
                                    <input id="nombre" type="text" name="nombre" class="form-control shadow-sm"  value="{{ old('nombre') }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="id_paciente">paciente</label>
                                    <select 
                                            name="id_paciente"
                                            id="id_paciente"
                                            class="js-example-basic-single js-example-responsive js-states form-control "
                                            style="width: 100%"> 
                                                                          
                                            <option value="">Seleccione</option>
                                            @forelse ($pacientes as $paciente)
                                              <option value="{{ $paciente->num_id }}" 
                                                >{{ $paciente->nombres }}</option>  
                                            @empty
                                                <option value="">Ningun paciente encontrado</option>
                                            @endforelse
                                            <option value="0">Documentos</option>
                                     </select>       
                                </div> 
    
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>        
                                    <input id="fecha" 
                                           type="date" 
                                           name="fecha" 
                                           class="form-control shadow-sm" 
                                           value="{{ old('fecha') }}"                               
                                           >
                                </div>
                                
                                <div class="form-group">
                                    <label for="valor">Valor del servicio</label>
                                    <input id="valor" type="number" name="valor" class="form-control shadow-sm" value="{{ old('valor') }}">
                                </div> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Documento</label>
                                <input name="documento" class="form-control" type="file" id="formFile">
                            </div>   
                            <button class="btn btn-primary btn-lg btn-block mt-4">Enviar Documento</button>
                        </div>                              
                    </form>
                    
                </div>
            </div>
        </div>
    </div> 
    
@endsection

@section('scripts')
    <script  type="text/javascript" defer="">
       
    </script>
@endsection