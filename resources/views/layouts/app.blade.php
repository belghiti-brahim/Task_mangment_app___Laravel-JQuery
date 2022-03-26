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
    <style>
        [x-cloak] {
            display: none;
        }

    </style>
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
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
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex gap-4">
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
                        console.log(response.success);
                        var message = response;
                        $("#action" + id).remove();
                        $("#deletemessage").append(response.success).show().fadeOut(3000, "linear");

                        // $("#deletemessage").toggle("<p>response</p>");


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
                        $("#deletemessage").append(response.success).show().fadeOut(3000, "linear");

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
                        $("#deletemessage").append(response.success).show().fadeOut(3000, "linear");

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
                type: 'PUT',
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
                type: 'PUT',
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

        function archiveProject(id) {

            var token = $("meta[name='csrf-token']").attr("content");
            var main_url = "http://127.0.0.1:8000";
            var referrer = "http://127.0.0.1:8000/project/archive/" + id;
            $.ajax({
                url: referrer,
                type: 'PUT',
                dataType: "json",
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(response) {
                    $("#projectCollection").load(location.href + " #projectCollection");
                }

            })
        }

        function showForm() {
            console.log("hhh")
            $('#actionform').toggle();
        }
    </script>
    <script>
        function app() {
            return {
                isOpen: false,
                colors: ['#F87171', '#FB923C', '#FFEB3B', '#A3E635', '#4CAF50', '#2DD4BF', '#60A5FA', '#C084FC', '#F472B6'],
                colorSelected: '#F87171'
            }
        }
    </script>
</body>

</html>
