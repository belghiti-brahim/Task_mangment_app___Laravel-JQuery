<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('today') }}" :active="request()->routeIs('today')">
            {{ __("Aujourd'hui") }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('week') }}" :active="request()->routeIs('week')">
            {{ __("cette semaine") }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('indexactions') }}" :active="request()->routeIs('indexactions')">
            {{ __('Toutes les actions') }}
        </x-jet-nav-link> 
        <x-jet-nav-link href="{{ route('creataction') }}" :active="request()->routeIs('creataction')">
            {{ __('Ajouter une action') }}
        </x-jet-nav-link>
    </x-slot>


    <main class="relative min-h-screen">
        <div class="ml-auto py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-3 gap-6">
                    @forelse ($actions as $action)
                        <div id="action{{ $action->id }}"
                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-12 flex flex-row items-center justify-around">
                            <a href="">
                                <p class=''>
                                    {{ $action->description }}</p>
                            </a>
                            <div class="flex flex-row">
                                <a href="javascript:void(0)" onclick="" class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                        src="{{ asset('images/edit.png') }}" alt="editbutton">
                                </a>
                                <a href="javascript:void(0)" onclick="deleteAction({{ $action->id }})"
                                    class="w-6 h-6 hover:w-8 hover:h-8"> <img src="{{ asset('images/delete.png') }}"
                                        alt="delete_button_icon">
                                </a>
                            </div>
                        </div>
                    @empty
                        <div
                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                            <p class="modelTitle">tu n'as aucune action</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>


    </div>
</x-app-layout>
