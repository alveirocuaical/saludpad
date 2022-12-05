<nav class="navbar navbar-light navbar-expand-lg bg-white shadow"> 
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            {{ config('app.name') }}
        </a>
    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end  " id="navbarSupportedContent">            
            <ul class="nav nav-pills ">

                <li class="nav-item">
                    <a class="nav-link {{ setActive('home') }}" href="{{ route('home') }}">{{ __('Home') }}</a>
                </li> 
                @can('view-document-index')
                    <li class="nav-item">
                        <a class="nav-link {{ setActive('documents.*') }}" href="{{ route('documents.index') }}">{{ __('upload  documents') }}</a>
                    </li> 
                @endcan
                
               
               
                @guest
                    <li class="nav nav-pills">
                        <a class="nav-link {{ setActive('login') }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>                     
                @else 
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <ul class="nav nav-pills ">
                                @can('view-document-admin-index')
                                <li class="nav-item">
                                    <a class="nav-link {{ setActive('admin-users.*') }}" href="{{ route('admin-users.index') }}">{{ __('Usuarios') }}</a>
                                </li> 
                                @endcan
                
                                @can('view-document-admin-index')
                                <li class="nav-item">
                                    <a class="nav-link {{ setActive('admin.*') }}" href="{{ route('admin.index') }}">{{ __('Descargar documentos') }}</a>
                                </li> 
                                @endcan
                            </ul>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest                   
            </ul>           
        </div>
               
    </div>         
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>