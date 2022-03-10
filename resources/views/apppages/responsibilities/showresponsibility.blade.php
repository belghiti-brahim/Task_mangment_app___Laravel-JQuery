<x-app-layout>
    <x-slot name="header">
        {{-- <x-jet-nav-link href="{{ route('createresponsability') }}"
            :active="request()->routeIs('createresponsability')">
            {{ __('Créer une résponsabilité') }}
        </x-jet-nav-link> --}}
        <x-jet-nav-link href="{{ route('createprojectfromresponsibility', $responsibility->id) }}"
            :active="request()->routeIs('createproject')">
            {{ __('Commencer un projet pour cette responsabilité') }}
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
    <div id="deletemessage" class="hidden flex items-center bg-lime-500 text-white text-sm font-bold px-4 py-3">
    </div>

    <main class="relative min-h-screen">
        <div class="px-10 pt-8 relative md:fixed md:w-2/5 md:min-h-screen lg:min-h-screen flex items-center justify-content">
            <div class="flex flex-col">
                <h1 class="pageContentTitle">Étant un **
                    <span class="font-light"> {{$responsibility->name}} </span> ** Je m'engage à réaliser:
                </h1>
                <p class="hidden md:block">Un projet est tout ce que nous voulons faire qui nécessite plus d'une étape
                    d'action . C'est donc un mécanisme pour se rappeler que, lorsque nous aurons terminé cette
                    première étape d'action, il y aura encore quelque chose à faire.
                </p>
            </div>
        </div>
        <div class="md:w-3/5 ml-auto py-12">

            <div id="projectCollection" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                    @forelse ($projects as $project)
                        @if ($project->archive === 1)
                            <div id="project{{ $project->id }}" style="outline-style: solid;
                                outline-color: {{ $responsibility->color }};"
                                class="px-8 py-4 bg-white shadow-xl sm:rounded-lg  min-h-[8rem] flex flex-col items-start justify-around">
                                <div class="flex flex-col gap-y-3">
                                    <a class="h-full w-full" href="{{ route('showproject', $project->id) }}">
                                        <p class="w-full hover:font-black">{{ $project->name }} </p>
                                    </a>
                                    <div class="flex flex-row">
                                        <a href="{{ route('editproject', $project->id) }}"
                                            class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                                src="{{ asset('images/edit.png') }}" alt="editbutton">
                                        </a>
                                        <a href="javascript:void(0)" onclick="archiveProject({{ $project->id }})"
                                            class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                                src="{{ asset('images/inbox.png') }}" alt="deltebutton">
                                        </a>
                                        <a href="javascript:void(0)" onclick="deleteProject({{ $project->id }})"
                                            class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                                src="{{ asset('images/delete.png') }}" alt="deltebutton">
                                        </a>
                                    </div>
                                    @forelse($project->children as $subproject)
                                        <div
                                            class="px-6 py-1 bg-gray-200 shadow-xl sm:rounded-lg w-68 h-full flex flex-row items-start justify-around gap-4">
                                            <a href="{{ route('showproject', $subproject->id) }}">
                                                <p class="hover:font-black">{{ $subproject->name }} </p>
                                            </a>
                                            <div class="flex flex-row">
                                                <a href="{{ route('editproject', $subproject->id) }}"
                                                    class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                                        src="{{ asset('images/edit.png') }}" alt="editbutton">
                                                </a>
                                                <a href="javascript:void(0)"
                                                    onclick="archiveProject({{ $project->id }})"
                                                    class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                                        src="{{ asset('images/inbox.png') }}" alt="deltebutton">
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
                        @else
                            <div id="project{{ $project->id }}" style="outline-style: solid;
                                outline-color: {{ $responsibility->color }};"
                                class="px-10 bg-white shadow-xl sm:rounded-lg  min-h-[8rem] flex flex-col items-start justify-around">
                                <div class="opacity-25 flex flex-col gap-y-3">
                                    <a class="h-full w-full" href="{{ route('showproject', $project->id) }}">
                                        <p class="w-full hover:font-bold">{{ $project->name }} </p>
                                    </a>
                                    <div class="flex flex-row">
                                        <a href="{{ route('editproject', $project->id) }}"
                                            class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                                src="{{ asset('images/edit.png') }}" alt="editbutton">
                                        </a>
                                        <a href="javascript:void(0)" onclick="archiveProject({{ $project->id }})"
                                            class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                                src="{{ asset('images/inbox.png') }}" alt="deltebutton">
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
                                                    onclick="archiveProject({{ $project->id }})"
                                                    class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                                        src="{{ asset('images/inbox.png') }}" alt="deltebutton">
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
                        @endif
                    @empty
                        <div
                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                            <p class="modelTitle">tu n'as aucun projet</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        {{ $projects->links('pagination::simple-tailwind') }}

    </main>
</x-app-layout>
