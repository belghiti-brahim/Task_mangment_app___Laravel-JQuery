<x-app-layout>
    <x-slot name="header">
        <x-jet-nav-link href="{{ route('indexprojects') }}" :active="request()->routeIs('indexprojects')">
            {{ __('Projets actifs') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('archivedprojects') }}" :active="request()->routeIs('archivedprojects')">
            {{ __('Projets archivés') }}
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('createproject') }}" :active="request()->routeIs('createproject')">
            {{ __('Créer un projet') }}
        </x-jet-nav-link>
    </x-slot>
    <div id="deletemessage" class="hidden flex items-center bg-lime-500 text-white text-sm font-bold px-4 py-3">
    </div>

    <main class="relative min-h-screen">
        <form action="{{ route('find') }}" method="GET">
            @csrf
            <div class="px-12 py-3 flex flex-row items-end">
                <div class="sm:p-6">
                    <div class="">
                        <div class="">
                            <label for="resonsibilityId" class="block text-sm font-medium text-gray-700">
                                Chercher un projet </label>
                            <div class="mt-1 flex rounded-md shadow-sm">

                                <input type="text" name="findproject" id="resonsibilityId"
                                    class="focus:ring-sky-500 focus:border-sky-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="Le nom du projet">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-6 text-left">
                    <button type="submit" class="btn">aller / retour</button>
                </div>
            </div>
        </form>
        <div class="ml-auto py-5">
            <div id="projectCollection" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid sm:grid-col-1 lg:grid-cols-3 gap-6">
                    @forelse ($responsibilities as $responsibility)
                        @foreach ($responsibility->projects as $project)
                         @if($project->archive === 0)
                            <div id="project{{ $project->id }}"
                                class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-col items-start justify-around">
                                <a href="{{ route('showproject', $project->id) }}">
                                    <p class="">{{ $project->name }} </p>
                                </a>
                                <div class="flex flex-row">
                                    <a href="{{ route('editproject', $project->id) }}"
                                        class="w-6 h-6 hover:w-8 hover:h-8"> <img src="{{ asset('images/edit.png') }}"
                                            alt="editbutton">
                                    </a>
                                    <a href="javascript:void(0)" onclick="archiveProject({{$project->id}})"
                                        class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                            src="{{ asset('images/inbox.png') }}" alt="deltebutton">
                                    </a>
                                    <a href="javascript:void(0)" onclick="deleteProject({{ $project->id }})"
                                        class="w-6 h-6 hover:w-8 hover:h-8"> <img
                                            src="{{ asset('images/delete.png') }}" alt="deltebutton">
                                    </a>
                                </div>
                            </div>
                            @else
                            @endif
                        @endforeach
                    @empty
                        <div
                            class="px-10 bg-white overflow-hidden shadow-xl sm:rounded-lg min-w-full h-40 flex flex-row items-center justify-between">
                            <p class="modelTitle">tu n'a aucun projet</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        {{ $responsibilities->links('pagination::simple-tailwind') }}

    </main>


    </div>
</x-app-layout>
