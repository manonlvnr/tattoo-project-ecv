<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                    <div class="-ml-4 -mt-4 flex items-center justify-between flex-wrap sm:flex-no-wrap">
                        <div class="ml-4 mt-4">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Les Flashs
                            </h3>

                            <!-- Créer un composant avec une image -->
                            <p class="mt-1 text-sm leading-5 text-gray-500">
                                Sélectionnez votre flash dans la liste ci-dessous.
                            </p>

                            <img style="width: 200px; height:200px" src="{{ asset('images/flash.png') }}" alt="flash" class="w-32">
                            
                    @foreach ($flashes as $flash)
                        <li>
                        <a >Flash</a>

                        </li><br>
                    @endforeach
                        

                        </div>
                    </div>


                <!-- <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div> -->
            </div>
        </div>
    </div>
</x-app-layout>
