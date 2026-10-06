@extends('layouts.animal')

@section('title', 'Modificar animal')

@section('content')
    {{-- El controlador pasa el ID y los datos del animal para precargar este formulario. --}}
    <div class="mx-auto max-w-2xl space-y-8">
        <div>
            <a href="{{ route('animals.index') }}" class="text-sm font-semibold text-emerald-400 transition hover:text-emerald-300">
                &larr; Volver al registro
            </a>
            <p class="mt-6 text-sm font-semibold uppercase tracking-widest text-emerald-400">Modificar animal</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-white">{{ $animal['name'] }}</h1>
            <p class="mt-2 text-slate-400">Actualizá el nombre y la especie del animal registrado.</p>
        </div>

        @if ($errors->any())
            {{-- Muestra los errores de validación si los datos enviados no cumplen las reglas del controlador. --}}
            <div class="rounded-xl border border-red-400/20 bg-red-400/10 px-4 py-3 text-sm text-red-300" role="alert">
                <p class="font-semibold">Revisá los datos ingresados:</p>
                <ul class="mt-2 list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Pasa el ID actual a la ruta para actualizar este animal. --}}
        <form action="{{ route('animals.update', $id) }}" method="POST" class="space-y-6 rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-lg shadow-slate-950/20 sm:p-8">
            {{-- El formulario POST se interpreta como PUT para invocar la acción de actualización. --}}
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-semibold text-slate-200">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name', $animal['name']) }}" required autofocus class="mt-2 block w-full rounded-lg border-slate-700 bg-slate-950 px-4 py-3 text-white shadow-sm placeholder:text-slate-500 focus:border-emerald-400 focus:ring-emerald-400">
            </div>

            <div>
                <label for="species" class="block text-sm font-semibold text-slate-200">Especie</label>
                <input type="text" id="species" name="species" value="{{ old('species', $animal['species']) }}" required class="mt-2 block w-full rounded-lg border-slate-700 bg-slate-950 px-4 py-3 text-white shadow-sm placeholder:text-slate-500 focus:border-emerald-400 focus:ring-emerald-400">
            </div>

            <div>
                <label for="edad" class="block text-sm font-semibold text-slate-200">Edad (años)</label>
                <input type="number" id="edad" name="edad" value="{{ old('edad', $animal['edad'] ?? '') }}" min="0" step="1" required class="mt-2 block w-full rounded-lg border-slate-700 bg-slate-950 px-4 py-3 text-white shadow-sm placeholder:text-slate-500 focus:border-emerald-400 focus:ring-emerald-400">
            </div>

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('animals.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-700 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:bg-slate-800">
                    Cancelar
                </a>
                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-emerald-500 px-4 py-2.5 text-sm font-semibold text-slate-950 transition hover:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 focus:ring-offset-slate-950">
                    Guardar cambios
                </button>
            </div>
        </form>
    </div>
@endsection
