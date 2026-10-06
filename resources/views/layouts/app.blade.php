<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'MovieApp') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-gray-100 font-sans text-gray-900 antialiased">
        <div class="flex min-h-screen flex-col">
            <nav class="border-b border-gray-200 bg-white">
                <div class="mx-auto flex w-full max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                    <a href="/" class="text-xl font-bold tracking-tight text-gray-900">
                        MovieApp
                    </a>
                </div>
            </nav>

            <main class="mx-auto w-full max-w-7xl flex-1 px-4 py-8 sm:px-6 lg:px-8">
                @yield('content')
            </main>

            <footer class="border-t border-gray-200 bg-white">
                <div class="mx-auto w-full max-w-7xl px-4 py-6 text-center text-sm text-gray-500 sm:px-6 lg:px-8">
                    &copy; {{ date('Y') }} MovieApp. Todos los derechos reservados.
                </div>
            </footer>
        </div>
    </body>
</html>
