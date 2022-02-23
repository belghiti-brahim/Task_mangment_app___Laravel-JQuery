<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('createresponsability') }}"
            :active="request()->routeIs('createresponsability')">
            {{ __('Créer une résponsabilité') }}
        </x-jet-nav-link>
    </x-slot>


    <main class="relative min-h-screen">
        <div class="px-10 relative md:fixed md:w-2/5 min-h-screen in flex items-center justify-content">
            <div class="flex flex-col">
                <h1 class="pageContentTitle">Je suis</h1>
                <p class="text-kramp-500">différents aspects de mon travail et de ma vie personnelle auxquels je souhaite
                    consacrer
                    mon temps de manière équilibrée, en espérant obtenir de bons résultats dans chacun d'eux .</p>
            </div>
        </div>
        <div class="md:w-3/5 ml-auto py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex flex-col items-center justify-center gap-6">
                    {{-- {{ dd($responsibilities) }} --}}

                    @forelse ($responsibilities as $responsibility)
                        <div id="res{{ $responsibility->id }}"
                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                            <a href="{{ route('showresponsibility', $responsibility->id) }}">
                                <p class='hover:text-6xl modelTitle'>
                                    {{ $responsibility->name }}</p>
                            </a>
                            <div class="flex flex-row">
                                <a href="{{ route('editresponsibility', $responsibility->id) }}"
                                    class="w-8 h-8 hover:w-12 hover:h-12"> <img src="{{ asset('images/edit.png') }}"
                                        alt="editbutton">
                                </a>
                                <a href="javascript:void(0)" onclick="deleteResponsibility({{ $responsibility->id }})"
                                    class="w-8 h-8 hover:w-12 hover:h-12"> <img src="{{ asset('images/delete.png') }}"
                                        alt="deltebutton">
                                </a>
                            </div>
                        </div>
                    @empty
                        <div
                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                            <p class="modelTitle">tu n'a aucune responsabilité</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </main>


    </div>
</x-app-layout>
