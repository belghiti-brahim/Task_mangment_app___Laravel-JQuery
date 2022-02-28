<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/themes/material_blue.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>

</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script>
        function deleteAction(id) {
            if (confirm("voulez-vous vraiment supprimer cette action?")) {
                var main_url = "http://127.0.0.1:8000";
                var referrer = "http://127.0.0.1:8000/actions/delete/" + id;
                $.ajax({
                    url: referrer,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        console.log(response);
                        $("#action" + id).remove();
                        
                    }

                })
            }

        }

        function deleteResponsibility(id) {
            if (confirm("voulez-vous vraiment supprimer cette responsabilité?")) {
                $.ajax({
                    url: 'delete/' + id,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        console.log(response);
                        $("#res" + id).remove();
                    }
                })
            }
        }

        function deleteProject(id) {
            if (confirm("voulez-vous vraiment supprimer ce projet?")) {
                var main_url = "http://127.0.0.1:8000";
                var referrer = "http://127.0.0.1:8000/project/delete/" + id;
                $.ajax({
                    url: referrer,
                    type: 'DELETE',
                    data: {
                        _token: $("input[name=_token]").val()
                    },
                    success: function(response) {
                        console.log(response);
                        $("#project" + id).remove();
                    }
                })
            }
        }

        function startAction(id) {

            var token = $("meta[name='csrf-token']").attr("content");
            var main_url = "http://127.0.0.1:8000";
            var referrer = "http://127.0.0.1:8000/actions/startaction/" + id;
            $.ajax({
                url: referrer,
                type: 'GET',
                dataType: "json",
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(response) {
                    $("#collection").load(location.href + " #collection");
                    $("#collectionl").load(location.href + " #collectionl");
                    $("#collectionm").load(location.href + " #collectionm");
                    $("#collectionme").load(location.href + " #collectionme");
                    $("#collectionj").load(location.href + " #collectionj");
                    $("#collectionv").load(location.href + " #collectionv");
                    $("#collections").load(location.href + " #collections");
                    $("#collectiond").load(location.href + " #collectiond");



                    // location.reload(true);
                }

            })
        }

        function doneAction(id) {

            var token = $("meta[name='csrf-token']").attr("content");
            var main_url = "http://127.0.0.1:8000";
            var referrer = "http://127.0.0.1:8000/actions/doneaction/" + id;
            $.ajax({
                url: referrer,
                type: 'GET',
                dataType: "json",
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(response) {
                    // location.reload(true);
                    $("#collection").load(location.href + " #collection");
                    $("#collectionl").load(location.href + " #collectionl");
                    $("#collectionm").load(location.href + " #collectionm");
                    $("#collectionme").load(location.href + " #collectionme");
                    $("#collectionj").load(location.href + " #collectionj");
                    $("#collectionv").load(location.href + " #collectionv");
                    $("#collections").load(location.href + " #collections");
                    $("#collectiond").load(location.href + " #collectiond");
                }

            })
        }
    </script>
</body>

</html>
