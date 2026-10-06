@extends('layouts.animal')

@section('title', 'Agregar animal')

@section('content')
    {{-- Formulario de alta: los campos deben coincidir con los datos validados por store(). --}}
    <div class="mx-auto max-w-2xl space-y-8">
        <div>
            <a href="{{ route('animals.index') }}" class="text-sm font-semibold text-emerald-400 transition hover:text-emerald-300">
                &larr; Volver al registro
            </a>
            <p class="mt-6 text-sm font-semibold uppercase tracking-widest text-emerald-400">Nuevo registro</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-white">Agregar animal</h1>
            <p class="mt-2 text-slate-400">Completá los datos para sumar un animal al registro.</p>
        </div>

        @if ($errors->any())
            {{-- Laravel devuelve aquí los errores de validación y conserva los valores previos con old(). --}}
            <div class="rounded-xl border border-red-400/20 bg-red-400/10 px-4 py-3 text-sm text-red-300" role="alert">
                <p class="font-semibold">Revisá los datos ingresados:</p>
                <ul class="mt-2 list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Envía el formulario a la ruta nombrada para crear animales. --}}
        <form action="{{ route('animals.store') }}" method="POST" class="space-y-6 rounded-2xl border border-slate-800 bg-slate-900 p-6 shadow-lg shadow-slate-950/20 sm:p-8">
            {{-- Protege el envío POST contra solicitudes falsificadas. --}}
            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold text-slate-200">Nombre</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus class="mt-2 block w-full rounded-lg border-slate-700 bg-slate-950 px-4 py-3 text-white shadow-sm placeholder:text-slate-500 focus:border-emerald-400 focus:ring-emerald-400" placeholder="Ej. León">
            </div>


            <div>
                <label for="species" class="block text-sm font-semibold text-slate-200">Especie</label>
                <input type="text" id="species" name="species" value="{{ old('species') }}" required class="mt-2 block w-full rounded-lg border-slate-700 bg-slate-950 px-4 py-3 text-white shadow-sm placeholder:text-slate-500 focus:border-emerald-400 focus:ring-emerald-400" placeholder="Ej. Panthera leo">
            </div>

            <div>
                <label for="edad" class="block text-sm font-semibold text-slate-200">Edad (años)</label>
                <input type="number" id="edad" name="edad" value="{{ old('edad') }}" min="0" step="1" required class="mt-2 block w-full rounded-lg border-slate-700 bg-slate-950 px-4 py-3 text-white shadow-sm placeholder:text-slate-500 focus:border-emerald-400 focus:ring-emerald-400" placeholder="Ej. 5">
            </div>

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('animals.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-700 px-4 py-2.5 text-sm font-semibold text-slate-300 transition hover:bg-slate-800">
                    Cancelar
                </a>
                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-emerald-500 px-4 py-2.5 text-sm font-semibold text-slate-950 transition hover:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-2 focus:ring-offset-slate-950">
                    Guardar animal
                </button>
            </div>
        </form>
    </div>
@endsection
