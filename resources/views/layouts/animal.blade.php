<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="color-scheme" content="dark">

        {{-- Cada vista define su título; la aplicación provee un nombre alternativo si no está configurado. --}}
        <title>@yield('title', 'Animales') · {{ config('app.name', 'Registro UNSJ') }}</title>

        <style>[x-cloak] { display: none !important; }</style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('head')
    </head>

    <body class="min-h-screen bg-slate-950 font-sans text-slate-100 antialiased">
        <div class="flex min-h-screen flex-col">
            <header class="border-b border-slate-800/80 bg-slate-950/95">
                {{-- La navegación se comparte entre el listado y los formularios de animales. --}}
                <nav x-data="{ open: false }" class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Navegación principal">
                    <div class="flex min-h-20 items-center justify-between gap-6">
                        <a href="{{ url('/animals') }}" class="group flex items-center gap-3" aria-label="Ir al registro de animales">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-400/10 text-2xl ring-1 ring-inset ring-emerald-400/20 transition group-hover:bg-emerald-400/20" aria-hidden="true">
                                🐾
                            </span>
                            <span>
                                <span class="block text-lg font-bold tracking-tight text-white">Registro Animal</span>
                                <span class="hidden text-sm text-slate-400 sm:block">Explorá nuestra biodiversidad</span>
                            </span>
                        </a>

                        <div class="hidden items-center gap-6 sm:flex">
                            <a href="{{ url('/animals') }}" class="text-sm font-semibold text-slate-300 transition hover:text-emerald-300">
                                Animales
                            </a>
                            @yield('header-actions')
                        </div>

                        <button type="button" @click="open = ! open" class="inline-flex items-center justify-center rounded-lg p-2 text-slate-400 transition hover:bg-slate-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-emerald-400 sm:hidden" :aria-expanded="open" aria-controls="animal-mobile-menu" aria-label="Abrir menú">
                            <svg class="h-6 w-6" :class="{ 'hidden': open, 'inline-flex': ! open }" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="hidden h-6 w-6" :class="{ 'hidden': ! open, 'inline-flex': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div id="animal-mobile-menu" x-cloak x-show="open" x-transition class="border-t border-slate-800 py-4 sm:hidden">
                        <a href="{{ url('/animals') }}" class="block rounded-lg px-3 py-2 text-sm font-semibold text-slate-300 transition hover:bg-slate-900 hover:text-emerald-300">
                            Animales
                        </a>
                        <div class="mt-3 flex flex-wrap gap-3 px-3">
                            @yield('header-actions')
                        </div>
                    </div>
                </nav>
            </header>

            <main class="mx-auto w-full max-w-7xl flex-1 px-4 py-8 sm:px-6 lg:px-8 lg:py-10">
                {{-- Los redirects con flash status muestran aquí su confirmación temporal. --}}
                @if (session('success'))
                    <div class="mb-6 rounded-xl border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-sm font-medium text-emerald-300" role="status">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>

            <footer class="border-t border-slate-800/80 bg-slate-950">
                <div class="mx-auto flex w-full max-w-7xl flex-col gap-2 px-4 py-6 text-sm text-slate-400 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <p>&copy; {{ now()->year }} Registro Animal</p>
                    <p>Conocé, cuidá y preservá <span aria-hidden="true">🌿</span></p>
                </div>
            </footer>
        </div>

        @stack('scripts')
    </body>
</html>
