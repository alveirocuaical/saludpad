@extends('layout')

@section('title','Saludpad | usuarios')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.validations_errors') 
            <div class="card">
                <div class="card-header">{{ __('Registrar usuario') }}</div>

                <div class="card-body shadow">
                    <form method="POST" action="{{ route('admin-users.update',$usuario) }}">
                        @csrf  @method('PATCH')

                        @include('admin.users.form',['btnText'=>'Actualizar'])

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
