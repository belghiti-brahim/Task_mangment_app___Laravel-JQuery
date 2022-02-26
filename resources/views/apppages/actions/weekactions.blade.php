<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('today') }}" :active="request()->routeIs('today')">
            {{ __("Aujourd'hui") }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('week') }}" :active="request()->routeIs('week')">
            {{ __('cette semaine') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('indexactions') }}" :active="request()->routeIs('indexactions')">
            {{ __('Toutes les actions') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('creataction') }}" :active="request()->routeIs('creataction')">
            {{ __('Ajouter une action') }}
        </x-jet-nav-link>
    </x-slot>


    <main class="relative min-h-screen">
        <div class="ml-auto py-12  flex flex-col items-center justify-center gap-8 ">
            {{-- lundi --}}
            <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
                <h1 class="hierarchyl1">Lundi</h1>
                <div class="grid grid-cols-3 gap-14">
                    <div class="col-start-1 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">TODO</h3>
                        @forelse ($mondayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-2 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">DOING</h3>
                        @forelse ($mondayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 2)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-3 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl"> DONE</h3>

                        @forelse ($mondayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- mardi --}}
            <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
                <h1 class="hierarchyl1">Mardi</h1>
                <div class="grid grid-cols-3 gap-14">
                    {{-- {{ dd($action->pivot)}} --}}
                    <div class="col-start-1 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">TODO</h3>
                        @forelse ($tueasdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                {{-- {{ dd($contextaction->pivot->context_id)}} --}}
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-2 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">DOING</h3>
                        @forelse ($tueasdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 2)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-3 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl"> DONE</h3>

                        @forelse ($tueasdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="line-through">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- mercredi --}}
            <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
                <h1 class="hierarchyl1">Mercredi</h1>
                <div class="grid grid-cols-3 gap-14">
                    {{-- {{ dd($action->pivot)}} --}}
                    <div class="col-start-1 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">TODO</h3>
                        @forelse ($wednesdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                {{-- {{ dd($contextaction->pivot->context_id)}} --}}
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-2 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">DOING</h3>
                        @forelse ($wednesdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 2)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-3 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl"> DONE</h3>

                        @forelse ($wednesdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="line-through">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- jeudi --}}
            <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
                <h1 class="hierarchyl1">Jeudi</h1>
                <div class="grid grid-cols-3 gap-14">
                    {{-- {{ dd($action->pivot)}} --}}
                    <div class="col-start-1 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">TODO</h3>
                        @forelse ($thursdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                {{-- {{ dd($contextaction->pivot->context_id)}} --}}
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-2 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">DOING</h3>
                        @forelse ($thursdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 2)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-3 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl"> DONE</h3>

                        @forelse ($thursdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="line-through">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- vendredi --}}
            <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
                <h1 class="hierarchyl1">Vendredi</h1>
                <div class="grid grid-cols-3 gap-14">
                    <div class="col-start-1 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">TODO</h3>
                        @forelse ($fridayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-2 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">DOING</h3>
                        @forelse ($fridayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 2)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-3 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl"> DONE</h3>

                        @forelse ($fridayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- samedi --}}
            <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
                <h1 class="hierarchyl1">Samedi</h1>
                <div class="grid grid-cols-3 gap-14">
                    <div class="col-start-1 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">TODO</h3>
                        @forelse ($saturdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-2 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">DOING</h3>
                        @forelse ($saturdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 2)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-3 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl"> DONE</h3>

                        @forelse ($saturdayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            {{-- dimanche --}}
            <div class="w-full mx-auto sm:px-6 lg:px-8 flex flex-col gap-4">
                <h1 class="hierarchyl1">Dimanche</h1>
                <div class="grid grid-cols-3 gap-14">
                    <div class="col-start-1 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">TODO</h3>
                        @forelse ($sundayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-2 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl">DOING</h3>
                        @forelse ($sundayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 2)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="col-start-3 flex flex-col gap-y-4">
                        <h3 class="font-bold text-xl"> DONE</h3>
                        @forelse ($sundayactions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="outline outline-orange-100 px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full flex flex-row items-center justify-between">
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-8 flex flex-row items-center justify-between">
                                <p>tu n'as aucune action</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>


    </div>
</x-app-layout>
