<div class="form-group row">
    <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('Identificacion') }}</label>

    <div class="col-md-6">
        <input id="id" type="number" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id',$usuario->id_usuario) }}" required autocomplete="id" autofocus>

        
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$usuario->name) }}" required autocomplete="name" autofocus>

    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$usuario->email) }}" required autocomplete="email">

    </div>
</div>


<div class="form-group row mr-0 ">

    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ $btnText }}
        </button>
    </div>
    
</div>
<div class="col-md-6 offset-md-4 float-rigth mt-4">
    <a href="{{ route('admin-users.index') }}">Volver</a> 
</div>

