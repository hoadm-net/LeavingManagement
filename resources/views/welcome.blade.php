<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('vendors/flatpickr/flatpickr.min.css') }}">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('vendors/flatpickr/flatpickr.js') }}"></script>
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <a href="{{ route('index') }}"><img src="{{ asset('images/logo.png') }}" alt="Hanwa Việt Nam"></a>
                        </div>
                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
                    </header>

                    <main class="mt-6">
                        <livewire:register />
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        &copy; HANWA Việt Nam
                    </footer>
                </div>
            </div>
        </div>

    <script>
        (function() {
            // var today = new Date();
            // today.setMinutes(0);
            // today.setSeconds(0);

            flatpickr(".hw-dt", {
                enableTime: true,
                dateFormat: "d-m-Y H:i",
                minuteIncrement: 15,
                time_24hr: true,
                // minDate: today
            });
        })();
    </script>
    </body>
</html>
