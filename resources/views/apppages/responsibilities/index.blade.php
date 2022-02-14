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
                <h1 class="pageContentTitle">Je suis</h1>
                <p class="text-kramp-500">différents aspects de mon travail et de ma vie personnelle auxquels je souhaite consacrer
                    mon temps de manière équilibrée, en espérant obtenir de bons résultats dans chacun d'eux .</p>
            </div>
        </div>
        <div class="md:w-3/5 ml-auto py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex flex-col items-center justify-center gap-6">
                    @forelse ($responsibilities as $responsibility)
                        <div
                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-col items-start justify-center">
                            <a href="{{ route('showresponsibility', $responsibility->id) }}">
                                <p class='modelTitle text-{{$responsibility->color}}-400'>
                                    {{ $responsibility->name }}</p>
                            </a>
                        </div>
                    @empty
                        <p>null</p>
                    @endforelse
                </div>
            </div>
        </div>

    </main>


    </div>
</x-app-layout>
