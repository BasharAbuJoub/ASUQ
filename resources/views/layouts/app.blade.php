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
</head>
<body>
    <div id="app">
        <nav class="navbar is-link">
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
            <section class="hero is-light">
                <div class="hero-body">
                    <div class="container" >
                        <h1 class="title">
                              # Dashboard
                        </h1>
                        <h2 class="subtitle">
                              Where you can manage everything ;D
                        </h2>
                    </div>
                </div>
            </section>
            <div class="container" style="padding: 0 20px;">
                @yield('content')
            </div>
        </main>
    </div>

    @yield('script')
</body>
</html>
