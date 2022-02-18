<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('createresponsability') }}"
            :active="request()->routeIs('createresponsability')">
            {{ __('Créer une résponsabilité') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('createproject') }}" :active="request()->routeIs('createproject')">
            {{ __('Créer un projet') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('creataction') }}" :active="request()->routeIs('creataction')">
            {{ __('Créer une action') }}
        </x-jet-nav-link>
    </x-slot>

    <main class="relative min-h-screen">
        <div class="px-10 relative md:fixed md:w-2/5 min-h-screen in flex items-center justify-content">
            <div class="flex flex-col">
                <h1 class="pageContentTitle">Autant que **
                    <span class="font-light">{{ $responsibility->name }} </span> ** Je m'engage à réaliser:
                </h1>
                <p class="text-kramp-500">un projet est tout ce que nous voulons faire qui nécessite plus d'une étape
                    d'action . C'est donc un mécanisme pour se rappeler que, lorsque nous aurons terminé cette première
                    étape d'action, il y aura encore quelque chose à faire.
                </p>
            </div>
        </div>
        <div class="md:w-3/5 ml-auto py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-6">
                    @forelse ($projects as $project)
                        <div
                            class="bg-{{ $responsibility->color }}-500 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-col items-start justify-around">
                            <a href="{{ route('showproject', $project->id) }}">
                                <p class="">{{ $project->name }} </p>
                            </a>
                            <div class="flex flex-row">
                                <a href="{{route("editproject", $project->id)}}" class="w-8 h-8 hover:w-12 hover:h-12"> <img
                                        src="{{ asset('images/edit.png') }}" alt="editbutton">
                                </a>
                                <a href="javascript:void(0)" onclick="deleteProject({{ $project->id }})"
                                    class="w-8 h-8 hover:w-12 hover:h-12"> <img src="{{ asset('images/delete.png') }}"
                                        alt="deltebutton">
                                </a>
                            </div>
                        </div>
                
                    @empty
                        <div
                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                            <p class="modelTitle">tu n'a aucun projet</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </main>


    </div>
</x-app-layout>
