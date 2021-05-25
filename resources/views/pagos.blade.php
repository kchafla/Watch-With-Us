<head>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-10 h-100 d-flex align-items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w-100">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="card">
                    <div class="card-header text-center bg-dark">
                        <h4 class="text-white">Donacion a Watch With Us</h4>
                    </div>
                    <div class="card-body">
                        <div id="errors" class="alert alert-danger fade show p-3" role="alert">
                            <span id="error_text"></span>
                        </div>
                        <div id="correcto" class="alert alert-success fade show p-3" role="alert">
                            <span>Compra realizada correctamente!</span>
                        </div>
                        <form>
                            <div class="form-group">
                                <label for="card-holder-name">Nombre</label>
                                <input type="text" class="form-control" id="card-holder-name" placeholder="Escribe tu nombre..." required/>
                            </div>

                            <div class="form-group mt-3">
                                <label for="card-holder-name">Cantidad (€)</label>
                                <input type="number" class="form-control" id="donation-quantity" placeholder="Ingresa una cantidad..." value="1" min="1.00" max="20.00" step="0.01" required/>
                            </div>

                            <div class="form-group mt-3">
                                <label for="exampleInputPassword1">Tarjeta</label>
                                <div id="card-element" class="form-control p-2"></div>
                            </div>

                            <button id="card-button" type="submit" class="btn btn-primary mt-3">Donar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/stripe.js') }}"></script>
</x-app-layout>
<x-application-footer></x-application-footer>