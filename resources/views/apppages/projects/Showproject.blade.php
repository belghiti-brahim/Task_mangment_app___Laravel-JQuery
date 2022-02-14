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
                <h1 class="pageContentTitle">Pour réalise le projet **
                    <span class="font-light">{{ $project->name }} </span> ** Je m'engage à faire:
                </h1>
                <p class="text-kramp-500">Les actions à effectuer à une date ou une heure spécifique vont dans le
                    Calendrier.
                </p>
            </div>
        </div>
        <div class="md:w-3/5 ml-auto py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-6">
                    @forelse ($actions as $action)
                        <div
                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-20 flex flex-row items-center justify-between">
                            <a href="">
                                <p class="">{{ $action->description }}</p>
                            </a>
                            <div class="flex flex-row">
                                <a href="javascript:void(0)" onclick="" class="w-8 h-8 hover:w-12 hover:h-12"> <img
                                        src="{{ asset('images/done.png') }}" alt="donebutton">
                                </a>
                                <a href="javascript:void(0)" onclick="" class="w-8 h-8 hover:w-12 hover:h-12"> <img
                                        src="{{ asset('images/edit.png') }}" alt="editbutton">
                                </a>
                                <a href="javascript:void(0)" onclick="" class="w-8 h-8 hover:w-12 hover:h-12"> <img
                                        src="{{ asset('images/delete.png') }}" alt="deltebutton">
                                </a>
                            </div>
                        </div>
                </div>
            @empty
                <div
                    class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                    <p class="modelTitle">tu n'a aucune projet</p>
                </div>
                @endforelse
            </div>
        </div>
        </div>

    </main>


    </div>
</x-app-layout>
