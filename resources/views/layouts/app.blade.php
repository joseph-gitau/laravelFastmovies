<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <?php header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure"); ?>

        <link rel="icon" type="image/x-icon" href="{{ asset('/assets/images/apple-touch-icon.png')}}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        {{-- font awesome --}}
        <script src="https://kit.fontawesome.com/5d07b6300c.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        {{-- jquery --}}
        <script src="{{ asset('js/jquery.js')}}"></script>
        {{-- user script --}}
        <script src="{{ asset('js/index.js')}}"></script>

        <style>
            #checkbox:checked + label .switch-ball{
              background-color: white;
              transform: translateX(24px);
              transition: transform 0.3s linear;
            }
          </style>
    </head>
    <body class="font-sans antialiased overflow-x-hidden">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            {{-- <livewire:partials.navbar /> --}}

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
    </body>
</html>
