<x-app-layout>
    <x-slot name="header">
        {{-- <x-jet-nav-link href="{{ route('createresponsability') }}"
            :active="request()->routeIs('createresponsability')">
            {{ __('Créer une résponsabilité') }}
        </x-jet-nav-link> --}}
        <x-jet-nav-link href="{{ route('createproject') }}" :active="request()->routeIs('createproject')">
            {{ __('Créer un projet') }}
        </x-jet-nav-link>
        {{-- <x-jet-nav-link href="{{ route('creataction') }}" :active="request()->routeIs('creataction')">
            {{ __('Créer une action') }}
        </x-jet-nav-link> --}}
    </x-slot>
    @if (session('message'))
        <div class="flex items-center bg-lime-500 text-white text-sm font-bold px-4 py-3" x-data="{ show: true }"
            x-show="show" x-init="setTimeout(() => show = false, 1500)">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <main class="relative min-h-screen">
        <div class="px-10 relative md:fixed md:w-2/5 min-h-screen in flex items-center justify-content">
            <div class="flex flex-col">
                <h1 class="pageContentTitle">Autant que **
                    <span class="font-light">{{ $responsibility->name }} </span> ** Je m'engage à réaliser:
                </h1>
                <p class="text-kramp-500">Un projet est tout ce que nous voulons faire qui nécessite plus d'une étape
                    d'action . C'est donc un mécanisme pour se rappeler que, lorsque nous aurons terminé cette
                    première étape d'action, il y aura encore quelque chose à faire.
                </p>
            </div>
        </div>
        <div class="md:w-3/5 ml-auto py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    @forelse ($projects as $project)
                        <div id="project{{ $project->id }}"
                            class="outline outline-orange-100 px-10 bg-white shadow-xl sm:rounded-lg  min-h-[8rem] flex flex-col items-start justify-around">
                            <div class="flex flex-col gap-y-3">
                                <a class="h-full w-full" href="{{ route('showproject', $project->id) }}">
                                    <p class="w-full hover:text-3xl font-bold">{{ $project->name }} </p>
                                </a>
                                <div class="flex flex-row">
                                    <a href="{{ route('editproject', $project->id) }}"
                                        class="w-6 h-6 hover:w-8 hover:h-8"> <img src="{{ asset('images/edit.png') }}"
                                            alt="editbutton">
                                    </a>
                                    <a href="javascript:void(0)" onclick="deleteProject({{ $project->id }})"
                                        class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                            src="{{ asset('images/delete.png') }}" alt="deltebutton">
                                    </a>
                                </div>
                                @forelse($project->children as $subproject)
                                    <div
                                        class="bg-gray-200 shadow-xl sm:rounded-lg w-68 h-full min flex flex-row items-start justify-around">
                                        <a href="{{ route('showproject', $subproject->id) }}">
                                            <p class="hover:text-1xl font-meduim">{{ $subproject->name }} </p>
                                        </a>
                                        <div class="flex flex-row">
                                            <a href="{{ route('editproject', $subproject->id) }}"
                                                class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                                    src="{{ asset('images/edit.png') }}" alt="editbutton">
                                            </a>
                                            <a href="javascript:void(0)"
                                                onclick="deleteProject({{ $subproject->id }})"
                                                class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                                    src="{{ asset('images/delete.png') }}" alt="deltebutton">
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    @empty
                        <div
                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                            <p class="modelTitle">tu n'as aucun projet</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </main>


    </div>
</x-app-layout>
