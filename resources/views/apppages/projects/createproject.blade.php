<x-app-layout>
    <x-slot name="header">
        <p>fgqg</p>

    </x-slot>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Projets</h3>
                        <p class="mt-1 text-sm text-gray-600">Chaque résultat qui nécessite plus de deux actions pour
                            être accompli</p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('storeproject') }}" method="POST">
                        @csrf
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                @if ($errors->any())
                                    <div class="bg-red-600 text-white">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="projectId" class="block text-sm font-medium text-gray-700">
                                            Le nom du projet
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <span
                                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-700 text-sm">
                                                Nom du projet: </span>
                                            <input type="text" name="name" id="projectId"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                placeholder="etudiant/directeur/freelancer...">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="about" class="block text-sm font-medium text-gray-700"> déscription
                                        courte </label>
                                    <div class="mt-1">
                                        <textarea id="about" name="description" rows="3"
                                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                            placeholder="..."></textarea>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-3">


                                    <label for="color" class="block text-sm font-medium text-gray-700">responsabilité</label>

                                    <select id="color" name="responsibility" autocomplete="color-name"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                        @forelse ($responsibilities as $responsibility)

                                            <option value={{ $responsibility->id }}>{{ $responsibility->name }}
                                            </option>

                                            @empty 
                                            <option>tu n'a aucun résponsibilité creé.</option>

                                        @endforelse
                                    </select>

                                </div>
                                <div class="col-span-6 sm:col-span-3">


                                    <label for="project" class="block text-sm font-medium text-gray-700">ce projet est le sous projet de</label>

                                    <select id="project" name="project" autocomplete="project-name"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        {{-- <option selected>Open this select menu</option> --}}
                                        <option value="">none
                                        </option>
                                        @forelse ($projects as $project)
                                        
                                            <option value={{ $project->id }}>{{ $project->name }}
                                            </option>

                                            @empty 
                                            <option>tu n'a aucun projet creé.</option>

                                        @endforelse
                                    </select>

                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
