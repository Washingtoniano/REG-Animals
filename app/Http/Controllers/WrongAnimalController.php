<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\AnimalDataRequest;

class WrongAnimalController extends Controller
{
    /**
     * Prepara datos de ejemplo y compatibilidad para sesiones sin animales.
     */
    public function __construct()
    {
        // La colección de animales vive en la sesión; estos valores permiten probar la pantalla al inicio.
        if (! session()->has('animals')) {
            session([
                'animals'=>[
                    '1'=> ['name' => 'Perro', 'species' => 'Canino', 'edad' => 3],
                    '2'=> ['name' => 'Gato', 'species' => 'Felino', 'edad' => 2],
                    '3'=> ['name' => 'Nemo', 'species' => 'Pez', 'edad' => 1],
                ]
            ]);
        }

        // Calcula un próximo entero a partir de las claves numéricas ya guardadas.
        // store() todavía usa uniqid(), por lo que este contador no participa en las altas actuales.
        if (! session()->has('animals_next_id')) {
            $animalIds = array_filter(
                array_keys(session('animals', [])),
                fn (int|string $id): bool => ctype_digit((string) $id)
            );

            session([
                'animals_next_id' => $animalIds === []
                    ? 1
                    : max(array_map('intval', $animalIds)) + 1,
            ]);
        }
    }

    /**
     * Muestra el registro completo de animales almacenado para la sesión actual.
     */
    public function index() 
    {
        $animals = session('animals');
        return view('animals.index', ['animals' => $animals]);
    }

    /**
     * Presenta el formulario para incorporar un animal al registro.
     */
    public function create() 
    {
        return view('animals.create');
    }

    /**
     * Valida los datos y agrega el animal a la colección de la sesión.
     */
    public function store(AnimalDataRequest $request)
    {
        // La validación limita los datos guardados a campos esperados y a una edad entera no negativa.
        $validated = $request->validated();

        // $validated['edad'] = (int) $validated['edad'];

        // La clave de sesión identifica el registro; uniqid() produce una clave de texto.
        $animals = session('animals');
        $nuevoID=uniqid();
        $animals[$nuevoID] = $validated;
        session(['animals' => $animals]);

        // Vuelve al listado y adjunta un mensaje temporal para la siguiente respuesta.
        return redirect()->route('animals.index')->with('success', 'Animal agregado correctamente.');
    }

    /**
     * Busca un animal por su clave y muestra el formulario de edición.
     */
    public function edit( $id) 
    {
        $animals= session('animals');
        $animal = $animals[$id] ?? null;

        // Si la clave no existe en la sesión, no hay registro que pueda editarse.
        if (! $animal){
            return redirect()->route('animals.index')->with('error', 'Animal no encontrado.');
        }

        return view('animals.edit', ['id' => $id, 'animal' => $animal]);
    }

    /**
     * Valida los campos enviados y reemplaza sus valores en el animal existente.
     */
    public function update(AnimalDataRequest $request,  $id)
    {
        // edad es obligatoria según estas reglas; el formulario de edición debe enviarla también.
        // $validated = $request->validated();

        $animals = session('animals');
        $animal = $animals[$id] ?? null;

        // Se conserva la colección y se actualiza solo el registro cuya clave vino en la ruta.
        if (! $animal) {
            return redirect()->route('animals.index')->with('error', 'Animal no encontrado.');
        }
        $animal = [...$animal, ...$request->validated()];
        $animals[$id] = $animal;
        session(['animals' => $animals]);
       

        return redirect()->route('animals.index')->with('status', 'Animal actualizado correctamente.');
    }

    /**
     * Elimina de la sesión el animal identificado por la clave de la ruta.
     */
    public function destroy(  $id) 
    {
        $animals = session('animals');
        $animal = $animals[$id] ?? null;

        // Evita modificar la colección si el ID no corresponde a un registro de esta sesión.
        if (! $animal) {
            return redirect()->route('animals.index')->with('error', 'Animal no encontrado.');
        }
        unset($animals[$id]);
        session(['animals' => $animals]);
        return redirect()->route('animals.index')->with('status', 'Animal eliminado correctamente.');

    }
    public function reset()
    {
        // Elimina la colección de animales y el contador de ID de la sesión.
        session()->forget(['animals']);
        return redirect()->route('animals.index')->with('success', 'Sesión de animales reiniciada correctamente.');
    }
}
