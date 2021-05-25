<link rel="stylesheet" href="{{ asset('css/cover.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-10 h-100 background">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden bg-transparent shadow-sm sm:rounded-lg">
                <div class="p-6 text-light h-100 d-flex align-items-center" alt="background fosc">
                    <div class="text-center">
                        <h1>Watch With Us</h1>
                        <p class="lead">Watch With Us tiene un objetivo simple: facilitar que los amigos vean videos juntos, sin importar en qué parte del mundo se encuentren. La idea de Watch With Us es brindarte un lugar genial donde puedas relajarte y divertirte con tus amigos. <br><br> ¡Disfruta de Watch With Us!</p>
                        <p class="lead">
                        <a href="{{ route('dashboard') }}" class="btn btn-lg btn-dark fw-bold border-white">Crear una sala</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-application-footer></x-application-footer>