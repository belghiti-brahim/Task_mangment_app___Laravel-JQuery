<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

              <h1>{{$responsibility->name}}</h1>


                @forelse ($projects as $project)

                        {{-- <a href="{{route("showresponsibility", $responsibility->id)}}"><p>{{ $responsibility->name }}</p></a> --}}
                        <p>{{ $project->name }}</p>
                @empty
                    <p>null</p>
                @endforelse

            </div>
        </div>

        <a href="#"
            class="inline-block text-center bg-cyan-600 border border-transparent rounded-md py-3 px-8 font-medium text-white hover:bg-indigo-700">Shop
            Collection</a>



    </div>
</x-app-layout>
