<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-dark border-b border-gray-200 text-light backgrounDark">
                    <!---->
                    <div class="d-flex justify-content-center">
                        <!--Apartat per a modificar les dades de l'usuari-->
                        <form class="w-50 text-center" action="{{ url('updateUser') }}" method="post" enctype="multipart/form-data">
                            <h3>Editar datos de usuario</h3>
                            @csrf
                            <div class="form-group mt-3">
                                <label for="name">Nombre de usuario</label>
                                <input type="text" class="form-control text-dark" name="name" id="name" placeholder="{{Auth::user()->name}}" autocomplete="off">
                            </div>
                            <div class="form-group mt-3">
                                <label for="email">Correo electrónico</label>
                                <input type="email" class="form-control text-dark" name="email" id="email" placeholder="{{Auth::user()->email}}" autocomplete="off">
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control text-dark" name="password" id="password" placeholder="Nueva contraseña..." autocomplete="off">
                            </div>
                            <div class="form-group mt-3">
                                <label for="image">Fondo de pantalla</label>
                                <input type="file" class="form-control text-dark" name="background" id="image" placeholder="Nueva contraseña..." accept="image/*">
                            </div>

                            <input type="hidden" value="{{Auth::user()->id}}" name="id">
                            <input type="hidden" value="{{Auth::user()->background}}" name="actualBack">

                            <button type="submit" name="actualitzar" class="btn btn-primary mt-3">Modificar</button>
                        
                        </form>
                        
                    </div>
                    <!---->
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>
<x-application-footer></x-application-footer>