<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('today') }}" :active="request()->routeIs('today')">
            {{ __("Aujourd'hui") }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('week') }}" :active="request()->routeIs('week')">
            {{ __('cette semaine') }}
        </x-jet-nav-link>
        {{-- <x-jet-nav-link href="{{ route('indexactions') }}" :active="request()->routeIs('indexactions')">
            {{ __('Toutes les actions') }}
        </x-jet-nav-link> --}}
        <x-jet-nav-link href="{{ route('creataction') }}" :active="request()->routeIs('creataction')">
            {{ __('Ajouter une action') }}
        </x-jet-nav-link>
    </x-slot>

    <div id="deletemessage" class="hidden flex items-center bg-lime-500 text-white text-sm font-bold px-4 py-3">
    </div>

    <main class="min-h-screen flex justify-center ">
        <div class="py-12 grid grid-cols-6">
            {{-- lundi --}}
            <div id="collectionl" class="sm:px-6 lg:px-8 flex flex-col gap-4">
                <h1 class="hierarchyl3">Lundi</h1>
                <div class="grid grid-col-1 gap-4">
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-base font-semibold">À faire</h3>
                        @forelse ($mondayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-col items-center justify-between">
                                        <a href="">
                                            <p class="text-sm">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            <a href="javascript:void(0)" onclick="startAction({{ $action->id }})"
                                                class="w-4 h-4 hover:w-6 hover:h-6">
                                                <img src="{{ asset('images/start.png') }}" alt="start action button">
                                            </a>
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
                                <p class="text-sm">tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-base font-semibold">Fait</h3>
                        @forelse ($mondayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="line-through text-sm">{{ $action->description }}</p>
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
                                <p class="text-sm">tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- mardi --}}
            <div id="collectionm" class="sm:px-6 lg:px-8 flex flex-col gap-4">
                <h1 class="hierarchyl3">Mardi</h1>
                <div class="grid grid-col-1 gap-4">
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-base font-semibold">À faire</h3>
                        @forelse ($tueasdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="text-sm">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            <a href="javascript:void(0)" onclick="startAction({{ $action->id }})"
                                                class="w-4 h-4 hover:w-6 hover:h-6">
                                                <img src="{{ asset('images/start.png') }}" alt="start action button">
                                            </a>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full items-center justify-between">
                                <p class="text-sm">tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-base font-semibold">Fait</h3>

                        @forelse ($tueasdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="line-through text-sm">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            {{-- <a href="javascript:void(0)" onclick="" class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/done.png') }}" alt="donebutton">
                                            </a> --}}
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
                                <p class="text-sm">tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- mercredi --}}
            <div id="collectionme" class="sm:px-6 lg:px-8 flex flex-col gap-4">
                <h1 class="hierarchyl3">Mercredi</h1>
                <div class="grid grid-col-1 gap-14">
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-base font-semibold">À faire</h3>
                        @forelse ($wednesdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="text-sm">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            <a href="javascript:void(0)" onclick="startAction({{ $action->id }})"
                                                class="w-4 h-4 hover:w-6 hover:h-6">
                                                <img src="{{ asset('images/start.png') }}" alt="start action button">
                                            </a>
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
                                <p class="text-sm">tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-base font-semibold">Fait</h3>
                        @forelse ($wednesdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="line-through text-sm">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            {{-- <a href="javascript:void(0)" onclick="" class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/done.png') }}" alt="donebutton">
                                            </a> --}}
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
                                <p class="text-sm">tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- jeudi --}}
            <div id="collectionj" class="sm:px-6 lg:px-8 flex flex-col gap-4">
                <h1 class="hierarchyl3">Jeudi</h1>
                <div class="grid grid-col-1 gap-14">
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-base font-semibold">À faire</h3>
                        @forelse ($thursdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="text-sm">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            <a href="javascript:void(0)" onclick="startAction({{ $action->id }})"
                                                class="w-4 h-4 hover:w-6 hover:h-6">
                                                <img src="{{ asset('images/start.png') }}" alt="start action button">
                                            </a>
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
                                <p class="text-sm">tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-base font-semibold">Fait</h3>

                        @forelse ($thursdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="line-through text-sm">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            {{-- <a href="javascript:void(0)" onclick="" class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/done.png') }}" alt="donebutton">
                                            </a> --}}
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
                                <p class="text-sm">tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- vendredi --}}
            <div id="collectionv" class="sm:px-6 lg:px-8 flex flex-col gap-4">
                <h1 class="hierarchyl3">Vendredi</h1>
                <div class="grid grid-col-1 gap-14">
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-base font-semibold">À faire</h3>
                        @forelse ($fridayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="text-sm">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            <a href="javascript:void(0)" onclick="startAction({{ $action->id }})"
                                                class="w-4 h-4 hover:w-6 hover:h-6">
                                                <img src="{{ asset('images/start.png') }}" alt="start action button">
                                            </a>
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
                                <p class="text-sm">tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="flex flex-col gap-y-4">
                        <h3 class="text-base font-semibold">Fait</h3>
                        @forelse ($fridayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="line-through text-sm">{{ $action->description }}</p>
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
                                <p class="text-sm">tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- samedi et dimanche --}}
            <div class="flex flex-col gap-8">
                <div id="collections" class="sm:px-6 lg:px-8 flex flex-col gap-4">
                    <h1 class="hierarchyl3">Samedi</h1>
                    <div class="grid grid-col-1 gap-4">
                        <div class="flex flex-col gap-y-4">
                            <h3 class="text-base font-semibold">À faire</h3>
                            @forelse ($saturdayactions as $action)
                                @foreach ($action->contexts as $contextaction)
                                    @if ($contextaction->pivot->context_id == 1)
                                        <div id="action{{ $action->id }}"
                                            class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                            <a href="">
                                                <p class="text-sm">{{ $action->description }}</p>
                                            </a>
                                            <div class="flex flex-row">
                                                <a href="javascript:void(0)" onclick="startAction({{ $action->id }})"
                                                    class="w-4 h-4 hover:w-6 hover:h-6">
                                                    <img src="{{ asset('images/start.png') }}"
                                                        alt="start action button">
                                                </a>
                                                <a href="{{ route('editaction', $action->id) }}" onclick=""
                                                    class="w-4 h-4 hover:w-8 hover:h-8">
                                                    <img src="{{ asset('images/edit.png') }}" alt="editbutton">
                                                </a>
                                                <a href="javascript:void(0)"
                                                    onclick="deleteAction({{ $action->id }})"
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
                                    <p class="text-sm">tu n'as aucune action</p>
                                </div>
                            @endforelse
                        </div>
                        <div class="flex flex-col gap-y-4">
                            <h3 class="text-base font-semibold">Fait</h3>
                            @forelse ($saturdayactions as $action)
                                @foreach ($action->contexts as $contextaction)
                                    @if ($contextaction->pivot->context_id == 3)
                                        <div id="action{{ $action->id }}"
                                            class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                            <a href="">
                                                <p class="line-through text-sm">{{ $action->description }}</p>
                                            </a>
                                            <div class="flex flex-row">
                                                <a href="{{ route('editaction', $action->id) }}" onclick=""
                                                    class="w-4 h-4 hover:w-8 hover:h-8">
                                                    <img src="{{ asset('images/edit.png') }}" alt="editbutton">
                                                </a>
                                                <a href="javascript:void(0)"
                                                    onclick="deleteAction({{ $action->id }})"
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
                                    <p class="text-sm">tu n'as aucune action</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div id="collectiond" class="sm:px-6 lg:px-8 flex flex-col gap-4">
                    <h1 class="hierarchyl3">Dimanche</h1>
                    <div class="grid grid-col-1 gap-4">
                        <div class="flex flex-col gap-y-4">
                            <h3 class="text-base font-semibold">À faire</h3>
                            @forelse ($sundayactions as $action)
                                @foreach ($action->contexts as $contextaction)
                                    @if ($contextaction->pivot->context_id == 1)
                                        <div id="action{{ $action->id }}"
                                            class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-start justify-between">
                                            <a href="">
                                                <p class="text-sm">{{ $action->description }}</p>
                                            </a>
                                            <div class="flex flex-row">
                                                <a href="javascript:void(0)" onclick="startAction({{ $action->id }})"
                                                    class="w-4 h-4 hover:w-6 hover:h-6">
                                                    <img src="{{ asset('images/start.png') }}"
                                                        alt="start action button">
                                                </a>
                                                <a href="{{ route('editaction', $action->id) }}" onclick=""
                                                    class="w-4 h-4 hover:w-8 hover:h-8">
                                                    <img src="{{ asset('images/edit.png') }}" alt="editbutton">
                                                </a>
                                                <a href="javascript:void(0)"
                                                    onclick="deleteAction({{ $action->id }})"
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
                                    <p class="text-sm">tu n'as aucune action</p>
                                </div>
                            @endforelse
                        </div>
                        <div class="flex flex-col gap-y-4">
                            <h3 class="text-base font-semibold">Fait</h3>
                            @forelse ($sundayactions as $action)
                                @foreach ($action->contexts as $contextaction)
                                    @if ($contextaction->pivot->context_id == 3)
                                        <div id="action{{ $action->id }}"
                                            class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                            <a href="">
                                                <p class="line-through text-sm">{{ $action->description }}</p>
                                            </a>
                                            <div class="flex flex-row">
                                                <a href="{{ route('editaction', $action->id) }}" onclick=""
                                                    class="w-4 h-4 hover:w-8 hover:h-8">
                                                    <img src="{{ asset('images/edit.png') }}" alt="editbutton">
                                                </a>
                                                <a href="javascript:void(0)"
                                                    onclick="deleteAction({{ $action->id }})"
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
                                    <p class="text-sm">tu n'as aucune action</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    </div>
</x-app-layout>
