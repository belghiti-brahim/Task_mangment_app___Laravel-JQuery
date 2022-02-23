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
        {{-- <div class="px-10 relative min-h-screen">
            <div class="flex flex-col">
                <h1 class="pageContentTitle">Tous mes projets</h1>
                <p class="text-kramp-500">différents aspects de mon travail et de ma vie personnelle auxquels je souhaite
                    consacrer
                    mon temps de manière équilibrée, en espérant obtenir de bons résultats dans chacun d'eux .</p>
            </div>
        </div> --}}
        <div class="ml-auto py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="grid grid-cols-3 gap-6">
                    @forelse ($actions as $action)
                        <div id="action{{ $action->id }}"
                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-around">
                            <a href="">
                                <p class=''>
                                    {{ $action->description }}</p>
                            </a>
                            <div class="flex flex-row">
                                <a href="javascript:void(0)" onclick="" class="w-8 h-8 hover:w-12 hover:h-12"> <img
                                        src="{{ asset('images/edit.png') }}" alt="editbutton">
                                </a>
                                <a href="javascript:void(0)"
                                    onclick="deleteAction({{ $action->id }})"
                                    class="w-8 h-8 hover:w-12 hover:h-12"> <img
                                        src="{{ asset('images/delete.png') }}" alt="delete_button_icon">
                                </a>
                            </div>
                        </div>
                    @empty
                        <div
                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                            <p class="modelTitle">tu n'a aucune action</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </main>


    </div>
    </x-app-layout>
