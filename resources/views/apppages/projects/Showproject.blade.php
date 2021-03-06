<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('createfromproject', $project->id) }}"
            :active="request()->routeIs('createfromproject')">
            {{ __('Ajouter une action') }}
        </x-jet-nav-link>
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
        <div
            class="px-10 pt-8 relative md:fixed md:w-4/12 md:min-h-screen lg:min-h-screen flex items-center justify-content">
            <div class="flex flex-col">
                <h1 class="pageContentTitle">Pour réaliser le projet
                    <span class="italic font-light">** {{ $project->name }} ** </span> J'effectue ces actions:
                </h1>
                <p class="hidden md:block">Les actions à effectuer à une date ou une heure spécifique vont dans le
                    Calendrier.
                </p>
            </div>
        </div>
        <div class="md:w-8/12 ml-auto py-12">
            <div id="collection" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="col-start-1 flex flex-col gap-y-4">
                        <h3 class="text-xl">À faire</h3>
                        @forelse ($actions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        style="outline-style: solid;
                                        outline-color: {{ $project->responsibility->color }};  outline-width: medium;"
                                        class="px-4 py-2 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row gap-1">
                                            <a href="javascript:void(0)" onclick="startAction({{ $action->id }})"
                                                class="w-4 h-4 hover:w-6 hover:h-6">
                                                <img src="{{ asset('images/start.png') }}" alt="start action button">
                                            </a>
                                            <a href="{{ route('editaction', $action->id) }}" onclick=""
                                                class="w-4 h-4 hover:w-6 hover:h-6">
                                                <img src="{{ asset('images/edit.png') }}" alt="edit button">
                                            </a>
                                            <a href="javascript:void(0)" onclick="deleteAction({{ $action->id }})"
                                                class="w-4 h-4 hover:w-6 hover:h-6"> <img
                                                    src="{{ asset('images/delete.png') }}" alt="delte button">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @empty
                            <div
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                <p class="hierarchyl2">tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-xl">En cours</h3>
                        @forelse ($actions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 2)
                                    <div id="action{{ $action->id }}"
                                        style="outline-style: solid;
                                        outline-color: {{ $project->responsibility->color }};  outline-width: medium;"
                                        class="px-4 py-2 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            <a href="javascript:void(0)" onclick="doneAction({{ $action->id }})"
                                                class="w-4 h-4 hover:w-6 hover:h-6">
                                                <img src="{{ asset('images/done.png') }}" alt="done button">
                                            </a>
                                            <a href="{{ route('editaction', $action->id) }}" onclick=""
                                                class="w-4 h-4 hover:w-6 hover:h-6">
                                                <img src="{{ asset('images/edit.png') }}" alt="edit button">
                                            </a>
                                            <a href="javascript:void(0)" onclick="deleteAction({{ $action->id }})"
                                                class="w-4 h-4 hover:w-6 hover:h-6"> <img
                                                    src="{{ asset('images/delete.png') }}" alt="delte button">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @empty
                            <div
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                <p class="hierarchyl2">tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-xl">Fait</h3>

                        @forelse ($actions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        style="outline-style: solid;
                                        outline-color: {{ $project->responsibility->color }};  outline-width: medium;"
                                        class="px-4 py-2 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="line-through">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            <a href="{{ route('editaction', $action->id) }}" onclick=""
                                                class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/edit.png') }}" alt="editbutton">
                                            </a>
                                            <a href="javascript:void(0)" onclick="deleteAction({{ $action->id }})"
                                                class="w-4 h-4 hover:w-6 hover:h-6"> <img
                                                    src="{{ asset('images/delete.png') }}" alt="deltebutton">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @empty
                            <div
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                <p class="hierarchyl2">tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
