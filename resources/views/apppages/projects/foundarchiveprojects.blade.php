<x-app-layout>
    <x-slot name="header">
        {{-- <x-jet-nav-link href="{{ route('createresponsability') }}"
            :active="request()->routeIs('createresponsability')">
            {{ __('Créer une résponsabilité') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('createproject') }}" :active="request()->routeIs('createproject')">
            {{ __('Créer un projet') }}
        </x-jet-nav-link> --}}
        <x-jet-nav-link href="{{ route('creataction') }}" :active="request()->routeIs('creataction')">
            {{ __('Créer une action') }}
        </x-jet-nav-link>
    </x-slot>
    <div id="deletemessage" class="hidden flex items-center bg-lime-500 text-white text-sm font-bold px-4 py-3">
    </div>

    <main class="relative min-h-screen">
        {{-- <div class="px-10 relative min-h-screen">
            <div class="flex flex-col">
                <h1 class="pageContentTitle">Tous mes projets</h1>
                <p class="text-kramp-500">différents aspects de mon travail et de ma vie personnelle auxquels je souhaite
                    consacrer
                    mon temps de manière équilibrée, en espérant obtenir de bons résultats dans chacun d'eux .</p>
            </div>
        </div> --}}
        <form action="{{ route('find') }}" method="GET">
            @csrf
            <div class="px-12 pt-4 flex flex-col md:flex-row lg:flex-row items-start lg:items-end">
                <div class="px-4 py-5 space-y-6 sm:p-6">
                    <div class="">
                        <div class="">
                            <label for="resonsibilityId" class="block text-sm font-medium text-gray-700">
                                Chercher un projet </label>
                            <div class="mt-1 flex rounded-md shadow-sm">

                                <input type="text" name="findproject" id="resonsibilityId"
                                    class="focus:ring-sky-500 focus:border-sky-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="Le nom du projet">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-5 lg:px-1 py-2 lg:py-6 text-left flex flex-row gap-4">
                    <div class="">
                        <button type="submit" class="btn">chercher</button>
                    </div>
                    <a href="{{ route('archivedprojects') }}" class="">
                        <button type="button" class="btn">index</button>
                    </a>
                </div>
            </div>
        </form>
        <div class="ml-auto py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6">

                    @forelse ($foundprojects as $project)
                        @if ($project->responsibility->user_id === $authid)
                            <div id="project{{ $project->id }}" style="outline-style: solid;
                            outline-color: {{ $project->responsibility->color }};"
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-col items-start justify-around">
                                <a href="{{ route('showproject', $project->id) }}">
                                    <p class="">{{ $project->name }} </p>
                                </a>
                                <div class="flex flex-row gap-1">
                                    <a href="{{ route('editproject', $project->id) }}"
                                        class="w-6 h-6 hover:w-8 hover:h-8"> <img src="{{ asset('images/edit.png') }}"
                                            alt="editbutton">
                                    </a>
                                    <a href="javascript:void(0)" onclick="deleteProject({{ $project->id }})"
                                        class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                            src="{{ asset('images/delete.png') }}" alt="deltebutton">
                                    </a>
                                </div>

                            </div>
                            @endif
                               @empty
                                <div
                                    class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                                    <p class="modelTitle">tu n'as aucun projet avec ce nom</p>
                                </div>
                            @endforelse
                    </div>
                </div>
            </div>


        </main>


        </div>
    </x-app-layout>
