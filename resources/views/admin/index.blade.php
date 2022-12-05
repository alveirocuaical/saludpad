
@extends('layout')

@section('title','Saludpad | Admin')
@section('content')  
<div class=" container">
    <div class="d-flex justify-content-between align-items-center">
            <div>               
                <h1 class="display-4 mb-0">Documentos</h1> 
            </div>        
    </div>
    <hr> 
   
    <div class="d-flex flex-wrap justify-content-between align-items-start">           
        
        <div class="border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">            
            <a href="{{ route('admin.show','fisioterapia') }}" type="button" class="btn btn-light ">
                <img id="fisioterapia" class=" img-fluid button-image" src="/img/folder2.svg" alt="Fisioterapia">
                <label for="fisioterapia">FISIOTERAPIA</label>
            </a>           
        </div>
        
        <div class="border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">            
            <a href="{{ route('admin.show','enfermeria') }}" type="button" class="btn btn-light ">
                <img id="enfermeria" class=" img-fluid button-image" src="/img/folder2.svg" alt="Fisioterapia">
                <label for="enfermeria">ENFERMERIA</label>
            </a>           
        </div>

        <div class="border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">            
            <a href="{{ route('admin.show','curaciones') }}" type="button" class="btn btn-light ">
                <img id="curaciones" class=" img-fluid button-image" src="/img/folder2.svg" alt="Fisioterapia">
                <label for="curaciones">CURACIONES</label>
            </a>           
        </div>

        <div class="border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">            
            <a href="{{ route('admin.show','terapia-respiratoria') }}" type="button" class="btn btn-light ">
                <img id="trespiratoria" class=" img-fluid button-image" src="/img/folder2.svg" alt="Fisioterapia">
                <label for="trespiratoria">TERAPIA RESPIRATORIA</label>
            </a>           
        </div>

        <div class="border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">            
            <a href="{{ route('admin.show','terapia-ocupacional') }}" type="button" class="btn btn-light ">
                <img id="tocupacional" class=" img-fluid button-image" src="/img/folder2.svg" alt="Fisioterapia">
                <label for="tocupacional">TERAPIA OCUPACIONAL</label>
            </a>           
        </div>

        <div class="border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">            
            <a href="{{ route('admin.show','fonoaudiologia') }}" type="button" class="btn btn-light ">
                <img id="fonoaudiologia" class=" img-fluid button-image" src="/img/folder2.svg" alt="Fisioterapia">
                <label for="fonoaudiologia">FONOAUDIOLOGIA</label>
            </a>           
        </div>

        <div class="border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">            
            <a href="{{ route('admin.show','consulta-medica') }}" type="button" class="btn btn-light ">
                <img id="cmedica" class=" img-fluid button-image" src="/img/folder2.svg" alt="Fisioterapia">
                <label for="cmedica">CONSULTA MEDICA</label>
            </a>           
        </div>

        <div class="border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">            
            <a href="{{ route('admin.show','cuentas-de-cobro') }}" type="button" class="btn btn-light ">
                <img id="cobro" class=" img-fluid button-image" src="/img/folder2.svg" alt="Fisioterapia">
                <label for="cobro">CUENTAS DE COBRO</label>
            </a>           
        </div>

        <div class="border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">            
            <a href="{{ route('admin.show','hojas-de-vida') }}" type="button" class="btn btn-light ">
                <img id="hv" class=" img-fluid button-image" src="/img/folder2.svg" alt="Fisioterapia">
                <label for="hv">HOJAS DE VIDA</label>
            </a>           
        </div>

        <div class="border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">            
            <a href="{{ route('admin.show','registro-firmas') }}" type="button" class="btn btn-light ">
                <img id="firmas" class=" img-fluid button-image" src="/img/folder2.svg" alt="Fisioterapia">
                <label for="firmas">REGISTRO DE FIRMAS</label>
            </a>           
        </div>

        <div class="border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">            
            <a href="{{ route('admin.show','medicamentos') }}" type="button" class="btn btn-light ">
                <img id="medicamentos" class=" img-fluid button-image" src="/img/folder2.svg" alt="Fisioterapia">
                <label for="medicamentos">MEDICAMENTOS</label>
            </a>           
        </div>

        <div class="border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">            
            <a href="{{ route('admin.show','procedimientos') }}" type="button" class="btn btn-light ">
                <img id="procedimientos" class=" img-fluid button-image" src="/img/folder2.svg" alt="Fisioterapia">
                <label for="procedimientos">PROCEDIMINETOS</label>
            </a>           
        </div>

        <div class="border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">            
            <a href="{{ route('admin.show','evaluaciones') }}" type="button" class="btn btn-light ">
                <img id="evaluaciones" class=" img-fluid button-image" src="/img/folder2.svg" alt="Fisioterapia">
                <label for="evaluaciones">EVALUACIONES</label>
            </a>           
        </div>
        
        
        
    </div>
     
@endsection
