<x-app-layout>
    <x-slot name="header">

        <x-jet-nav-link href="{{ route('today') }}" :active="request()->routeIs('today')">
            {{ __("Aujourd'hui") }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('week') }}" :active="request()->routeIs('week')">
            {{ __('Cette semaine') }}
        </x-jet-nav-link>
        {{-- <x-jet-nav-link href="{{ route('indexactions') }}" :active="request()->routeIs('indexactions')">
            {{ __('Toutes les actions') }}
        </x-jet-nav-link> --}}
        {{-- <x-jet-nav-link href="{{ route('creataction') }}" :active="request()->routeIs('creataction')">
            {{ __('Ajouter une action') }}
        </x-jet-nav-link> --}}
        <a href="javascript:void(0)" onclick="showForm()"
            class='inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-1xl font-Catamaran font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-sky-600 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition'>Ajouter
            une action</a>

    </x-slot>

    @if (session('message'))
        <div class="flex items-center bg-lime-500 text-white text-sm font-bold px-4 py-3" x-data="{ show: true }"
            x-show="show" x-init="setTimeout(() => show = false, 1500)">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    <div id="deletemessage" class="hidden flex items-center bg-lime-500 text-white text-sm font-bold px-4 py-3">
    </div>

    <div id="actionform" class="hidden my-4 flex items-center justify-center">
        <form action="{{ route('directaction') }}" method="POST">
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    @if ($errors->any())
                        <div class="bg-red-600 text-white">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>* {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="actionId" class="block text-sm font-medium text-gray-700">
                                Déscription de l'action
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span
                                    class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-700 text-sm">
                                    faire: </span>
                                <input type="text" name="description" id="actionId"
                                    class="focus:ring-sky-500 focus:border-sky-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                        </div>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="project" class="block text-sm font-medium text-gray-700">Projet</label>
                        <select id="project" name="project" autocomplete="color-name"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                            @forelse ($projects as $project)
                                @if ($project->archive === 1)
                                    <option value={{ $project->id }}>{{ $project->name }}</option>
                                @endif
                            @empty
                                <option value="">Il n'y a aucun projet</option>
                            @endforelse
                        </select>
                    </div>

                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="btn">Save</button>
                </div>
            </div>
        </form>
    </div>

    <main class="relative min-h-screen">
        <div class="ml-auto py-12">
            <div id="collection" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="">
                    <h1 class="hierarchyl1">{{ $today }}</h1>
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 gap-6">
                        <div class="flex flex-col gap-y-4">
                            <h3 class="text-xl">À faire</h3>

                            @forelse ($actions as $action)
                                @foreach ($action->contexts as $contextaction)
                                    @if ($contextaction->pivot->context_id == 1)
                                        <div id="action{{ $action->id }}"
                                            style="outline-style: solid;
                                                outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full min-h-[2rem] flex flex-row items-center justify-between"
                                            p>
                                            <a href="">
                                                <p class="">{{ $action->description }}</p>
                                                <p style="color:{{ $action->project->responsibility->color }}"
                                                    class="p-1 my-2 w-full text-sm rounded outline-none">
                                                    #{{ $action->project->name }}<p>

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
                                    <p class="hierarchyl2">tu n'a aucune action</p>
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
                                                outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full min-h-[2rem] flex flex-row items-center justify-between">
                                            <a href="">
                                                <p class="">{{ $action->description }}</p>
                                                <p style="color:{{ $action->project->responsibility->color }};"
                                                    class="py-1 w-full text-sm rounded outline-none">
                                                    #{{ $action->project->name }}<p>
                                            </a>
                                            <div class="flex flex-row">
                                                <a href="javascript:void(0)" onclick="doneAction({{ $action->id }})"
                                                    class="w-4 h-4 hover:w-6 hover:h-6">
                                                    <img src="{{ asset('images/done.png') }}" alt="done button">
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
                                    <p class="hierarchyl2">tu n'a aucune action</p>
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
                                                outline-color: {{ $action->project->responsibility->color }};  outline-width: medium;"
                                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full min-h-[2rem] flex flex-row items-center justify-between">
                                            <a href="">
                                                <p class="line-through">{{ $action->description }}</p>
                                                <p style="color:{{ $action->project->responsibility->color }};"
                                                    class="py-1 w-full text-sm rounded outline-none">
                                                    #{{ $action->project->name }}<p>

                                            </a>
                                            <div class="flex flex-row">
                                                {{-- <a href="javascript:void(0)" onclick="" class="w-4 h-4 hover:w-8 hover:h-8">
                                                <img src="{{ asset('images/done.png') }}" alt="donebutton">
                                            </a> --}}
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
                                    <p class="hierarchyl2">tu n'a aucune action</p>
                                </div>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
