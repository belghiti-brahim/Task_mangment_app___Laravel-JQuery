<x-app-layout>
    <x-slot name="header">
        <p>fgqg</p>

    </x-slot>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Les actions</h3>
                        <p class="mt-1 text-sm text-gray-600">One and done</p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ route('storeaction') }}" method="POST">
                        @csrf
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    @if ($errors->any())
                                        <div class="bg-red-600 text-white">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="actionId" class="block text-sm font-medium text-gray-700">
                                            Déscription de l'action
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <span
                                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-700 text-sm">
                                                faire: </span>
                                            <input type="text" name="description" id="actionId"
                                                class="focus:ring-sky-500 focus:border-sky-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                placeholder="etudiant/directeur/freelancer...">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="about" class="block text-sm font-medium text-gray-700"> definition of
                                        done </label>
                                    <div class="mt-1">
                                        <textarea id="about" name="defintionOfDone" rows="3"
                                            class="shadow-sm focus:ring-sky-500 focus:border-sky-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                            placeholder="..."></textarea>
                                    </div>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="project" class="block text-sm font-medium text-gray-700">Projet</label>
                                    <select id="project" name="project" autocomplete="color-name"
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                                        @forelse ($projects as $project)
                                            <option value={{ $project->id }}>{{ $project->name }}</option>

                                        @empty
                                            <option>Il n'y a aucun projet</option>

                                        @endforelse

                                    </select>
                                </div>
                                <div x-data
                                    x-init="flatpickr($refs.datetimewidget, {wrap: true, enableTime: true, dateFormat: 'M j, Y h:i K'});"
                                    x-ref="datetimewidget"
                                    class="flatpickr container mx-auto col-span-6 sm:col-span-6 mt-5">
                                    <label for="datetime"
                                        class="flex-grow  block font-medium text-sm text-gray-700 mb-1">date d'échéance de l'action </label>
                                    <div class="flex align-middle align-content-center">
                                        <input x-ref="datetime" type="text" id="datetime" data-input name="deadline"
                                            placeholder="Select.."
                                            class="block w-full px-2 border-gray-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-l-md shadow-sm">

                                        <a class="h-11 w-10 input-button cursor-pointer rounded-r-md bg-transparent border-gray-300 border-t border-b border-r"
                                            title="clear" data-clear>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mt-2 ml-1"
                                                viewBox="0 0 20 20" fill="#c53030">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit"
                                    class="btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>






    </div>
</x-app-layout>
