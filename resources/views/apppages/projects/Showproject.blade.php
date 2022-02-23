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
        <div class="px-10 relative md:fixed md:w-4/12 min-h-screen in flex items-center justify-content">
            <div class="flex flex-col">
                <h1 class="pageContentTitle">Pour réaliser le projet **
                    @foreach ($project as $pro)

                    <span class="font-light">{{ $pro->name }} </span> 
                    @endforeach ** Je m'engage à faire:
                </h1>
                <p class="text-kramp-500">Les actions à effectuer à une date ou une heure spécifique vont dans le
                    Calendrier.
                </p>
            </div>
        </div>
        <div class="md:w-8/12 ml-auto py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-3 gap-6">
                        {{-- {{ dd($action->pivot)}} --}}
                        <div class="col-start-1">
                            <h3>TODO</h3>

                            @forelse ($actions as $action)
                            @foreach ($action->contexts as $contextaction)
                                {{-- {{ dd($contextaction->pivot->context_id)}} --}}
                                @if ($contextaction->pivot->context_id == 1)
                                    <div id="action{{ $action->id }}"
                                        class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-20 flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            <a href="javascript:void(0)" onclick="" class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/done.png') }}" alt="donebutton">
                                            </a>
                                            <a href="{{ route('editaction', $action->id) }}" onclick="" class="w-4 h-4 hover:w-8 hover:h-8">
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                                <p class="modelTitle">tu n'a aucune action</p>
                            </div>
                        @endforelse
                        </div>

                        <div class="col-start-2">
                            <h3>DOING</h3>

                            @forelse ($actions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 2)
                                    <div id="action{{ $action->id }}"
                                        class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-20 flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            <a href="javascript:void(0)" onclick="" class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/done.png') }}" alt="donebutton">
                                            </a>
                                            <a href="{{ route('editaction', $action->id) }}" onclick="" class="w-4 h-4 hover:w-8 hover:h-8">
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                                <p class="modelTitle">tu n'a aucune action</p>
                            </div>
                        @endforelse
                        </div>

                        <div class="col-start-3">
                            <h3>DONE</h3>

                            @forelse ($actions as $action)
                            @foreach ($action->contexts as $contextaction)
                                @if ($contextaction->pivot->context_id == 3)
                                    <div id="action{{ $action->id }}"
                                        class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-20 flex flex-row items-center justify-between">
                                        <a href="">
                                            <p class="">{{ $action->description }}</p>
                                        </a>
                                        <div class="flex flex-row">
                                            <a href="javascript:void(0)" onclick="" class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/done.png') }}" alt="donebutton">
                                            </a>
                                            <a href="{{ route('editaction', $action->id) }}" onclick="" class="w-4 h-4 hover:w-8 hover:h-8">
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
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                                <p class="modelTitle">tu n'a aucune action</p>
                            </div>
                        @endforelse
                        </div>





               
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
