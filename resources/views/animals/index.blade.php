@extends('layouts.animal')

@section('title', 'Animales registrados')

@section('content')
    {{-- El listado consume la colección que el controlador obtiene de la sesión actual. --}}
    <div class="space-y-8">
        <div class="flex flex-col gap-4 border-b border-slate-800 pb-6 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-widest text-emerald-400">Registro</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Animales registrados</h1>
                <p class="mt-2 max-w-2xl text-slate-400">Consultá de forma rápida los animales que forman parte del registro.</p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <span class="inline-flex w-fit items-center rounded-full bg-emerald-400/10 px-3 py-1 text-sm font-semibold text-emerald-300 ring-1 ring-inset ring-emerald-400/20">
                    {{ count($animals) }} {{ count($animals) === 1 ? 'animal' : 'animales' }}
                </span>
                <a href="{{ route('animals.create') }}" class="inline-flex items-center rounded-lg bg-emerald-500 px-4 py-2.5 text-sm font-semibold text-slate-950 transition hover:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 focus:ring-offset-slate-950">
                    + Agregar animal
                </a>
                    <form action="{{ route('animals.reset') }}" method="POST" class="inline-flex items-center rounded-lg bg-emerald-500 px-4 py-2.5 text-sm font-semibold text-slate-950 transition hover:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 focus:ring-offset-slate-950">
                        @csrf
                        @method('POST')
                        <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-emerald-500 px-4 py-2.5 text-sm font-semibold text-slate-950 transition hover:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 focus:ring-offset-slate-950" onclick="return confirm('¿Estás seguro de que deseas resetear la sesión? Esto eliminará todos los animales registrados.');">
                            Resetear sesión
                        </button>
                    </form>
            </div>
        </div>

        @if (count($animals) > 0)
            {{-- Cada tarjeta representa un elemento; la clave de sesión se usa para editarlo o borrarlo. --}}
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($animals as $id => $animal)
                    <article class="rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-lg shadow-slate-950/20 transition hover:-translate-y-1 hover:border-emerald-400/50 hover:shadow-emerald-950/30">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-sm font-medium text-emerald-400">Animal #{{ $loop->iteration }}</p>
                                <h2 class="mt-2 text-xl font-bold text-white">{{ $animal['name'] }}</h2>
                            </div>
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-400/10 text-lg" aria-hidden="true">🐾</span>
                        </div>
                        <p class="mt-6 border-t border-slate-800 pt-4 text-sm text-slate-400">
                            <span class="font-semibold text-slate-200">Especie:</span>
                            {{ $animal['species'] }}
                        </p>
                        <p class="mt-2 text-sm text-slate-400">
                            <span class="font-semibold text-slate-200">Edad:</span>
                            {{ isset($animal['edad']) ? $animal['edad'].' años' : 'No informada' }}
                        </p>
                        {{-- Los enlaces de acciones usan las rutas nombradas del grupo animals. --}}
                        <div class="mt-6 flex items-center gap-3 border-t border-slate-800 pt-4">
                            <a href="{{ route('animals.edit', $id) }}" class="inline-flex items-center rounded-lg border border-emerald-400/50 px-3 py-2 text-sm font-semibold text-emerald-300 transition hover:bg-emerald-400/10">
                                Modificar
                            </a>
                            <form action="{{ route('animals.destroy', $id) }}" method="POST" onsubmit="return confirm('¿Eliminar este animal?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center rounded-lg border border-red-400/50 px-3 py-2 text-sm font-semibold text-red-300 transition hover:bg-red-400/10">
                                    Borrar
                                </button>
                            </form>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            {{-- Estado vacío cuando todavía no hay animales en la sesión. --}}
            <div class="rounded-2xl border border-dashed border-slate-700 bg-slate-900 px-6 py-16 text-center shadow-lg shadow-slate-950/20">
                <h2 class="text-lg font-semibold text-white">No hay animales registrados</h2>
                <p class="mt-2 text-slate-400">Cuando registres un animal, aparecerá en este listado.</p>
            </div>
        @endif
    </div>
@endsection