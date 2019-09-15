<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ASUQ') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/guest.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar is-white">
            <div class="container" >
                <div class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item">
                            Home
                        </a>
                    </div>

                    <div class="navbar-end">
                        <!-- navbar items -->
                    </div>
                </div>
            </div>
        </nav>
        <main class="py-4">

            <div class="container" style="padding: 0 20px;">
                @if (session('notify') != null)
                <div id="notify" class="notification is-{{session('type')}}" style="margin-top: 20px;">
                    <button class="delete" onclick="removeNotification()"></button>
                    {{session('notify')}}
                </div>

                @endif
                @yield('content')
            </div>
        </main>

        {{-- <section class="hero is-dark" style="margin-top: 180px;">
            <div class="hero-body">
                <div class="container has-text-centered" >
                    <h2 class="title is-4">
                          Applied Science University
                    </h2>
                    <hr style="background-color: #525252; height: 1px;">
                    <h4>
                        © Applied Scinece University 2019. All rights reserved.
                    </h2>
                </div>
            </div>
        </section> --}}

    </div>


    @yield('script')
    <script>
        function removeNotification(){

            document.getElementById('notify').remove();

        }
    </script>

</body>
</html>
