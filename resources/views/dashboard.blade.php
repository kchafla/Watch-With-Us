<head>
    <script src="{{ asset('js/sales.js') }}" defer></script>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-dark border-b border-gray-200 text-light backgrounDark">
                    <div class="card text-center bg-transparent">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs d-flex justify-content-center">
                                <li class="nav-item col-md-3">
                                    <a class="nav-link active bg-dark text-light rounded" id="missalas"><button>Tus salas</button></a>
                                </li>
                                <li class="nav-item col-md-3 offset-md-1">
                                    <a class="nav-link border border-white bg-dark rounded text-secondary" id="otrassalas"><button>Otras salas</button></a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body bg-transparent" id="otras">
                            <div class="row">
                                @if (count($joinedsalas) == 0)
                                    <h1 class="text-center mt-2">No te has unido a ninguna sala!</h1>
                                @else
                                    @for ($i = 0; $i < count($joinedsalas); $i++)
                                        @if ($i == 3)
                                            </div>
                                            <div class="row mt-0 mt-md-3">
                                        @endif
                                        <div class="col-sm-4 mt-3 mt-md-0">
                                            <div class="card bg-dark border border-white">
                                                <a href="{{ url('sala/'.$joinedsalas[$i]->id) }}"><img class="card-img-top" src="https://img.youtube.com/vi/{{ $joinedvideos[$i] }}/0.jpg" alt="Sala {{ $joinedsalas[$i]->name }}"></a>
                                                <div class="card-body">
                                                    <h5 class="card-title text-truncate" title="{{ $joinedsalas[$i]->name }}">{{ $joinedsalas[$i]->name }}</h5>
                                                    <p class="card-text text-secondary">{{ $joinedsalas[$i]->created_at }}</p>
                                                    <div class="row">
                                                        <a href="{{ url('sala/'.$joinedsalas[$i]->id) }}" class="btn btn-primary col-md-8 offset-md-2">Entrar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                @endif
                            </div>
                        </div>

                        <div class="card-body bg-transparent" id="tuyas">
                            <div class="row">
                                @for ($i = 0; $i < count($salas); $i++)
                                    @if ($i == 3)
                                        </div>
                                        <div class="row mt-0 mt-md-3">
                                    @endif
                                    <div class="col-sm-4 mt-3 mt-md-0">
                                        <div class="card bg-dark border border-white">
                                            <a href="{{ url('sala/'.$salas[$i]->id) }}"><img class="card-img-top" src="https://img.youtube.com/vi/{{ $videos[$i] }}/0.jpg" alt="Sala {{ $salas[$i]->name }}"></a>
                                            <div class="card-body">
                                                <h5 class="card-title text-truncate" title="{{ $salas[$i]->name }}">{{ $salas[$i]->name }}</h5>
                                                <p class="card-text text-secondary">{{ $salas[$i]->created_at }}</p>
                                                <div class="row">
                                                    <a href="{{ url('sala/'.$salas[$i]->id) }}" class="btn btn-primary col-md-5 offset-md-1">Entrar</a>
                                                    <button class="btn-warning btn col-md-4 offset-md-1" data-toggle="modal" data-target="#a{{ $salas[$i]->id }}">Editar</button>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="a{{ $salas[$i]->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content bg-dark border border-white">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Editar sala</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-light">Nombre de la sala:</p>
                                                                <form action="{{url('salasUpdate')}}" method="post">
                                                                    @csrf
                                                                    <input class="text-dark" type="text" placeholder="{{ $salas[$i]->name }}" name="name" maxlength="50" autocomplete="off">
                                                                    <input type="hidden" value="{{ $salas[$i]->id }}" name="id">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                                </form>
                                                                <form action="{{url('delete')}}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $salas[$i]->id }}" name="id">
                                                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                                @if (count($salas) == 3)
                                    </div>
                                    <div class="row mt-0 mt-md-3">
                                @endif
                                @if (count($salas) < 6)
                                    <div class="col-sm-4 mt-3 mt-md-0" id="nuevasala">
                                        <div class="card bg-dark border border-white h-100 d-flex align-items-center justify-content-center">
                                            <a href="{{ route('crear') }}" class="w-50 h-50"><img class="img-fluid" src="{{ asset('images/web/add.png') }}" id="imagenmas" alt="Icono con un plus"></a>
                                            <h5 class="card-title text-truncate"">Crear una sala</h5>
                                            <p class="text-muted">[{{ count($salas) }} / 6]</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</x-app-layout>
<x-application-footer></x-application-footer>