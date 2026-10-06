<?php
namespace App\Services;
use App\Contracts\AnimalServiceInterface;
use Illuminate\Support\Facades\Storage; //vendor/laravel/framework/src/Illuminate/Support/Facades/Storage.php
//Illuminate depende del framework, no se toca
use App\Exceptions\AnimalNotFoundException;
class FileAnimalServices implements AnimalServiceInterface
{
    // Implementación de los métodos de la interfaz AnimalServiceInterface
    // utilizando almacenamiento en archivos en lugar de la sesión.
    private function saveAnimals(array $animals): void
    {
        Storage::disk('animals')->put('animals.json', json_encode($animals, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_THROW_ON_ERROR));
    }
    private function getAnimals(): array
    {
        $animals = Storage::disk('animals')->exists('animals.json') ? Storage::disk('animals')->get('animals.json') : '[]';
        return json_decode($animals, true) ?? [];
    }
    public function all(): array
    {
        return $this->getAnimals();
    }
    public function find(string $id): ?array
    {
        $animals = $this->all();
        if (!isset($animals[$id])) {
            throw AnimalNotFoundException::forId($id);
        }
        return $animals[$id];
    }
    public function create(array $data): array
    {
        $animals = $this->all();
        $newId = uniqid();
        $animals[$newId] = $data;
        $this->saveAnimals($animals);
        
        return ['id' => $newId] + $data;
    }
    public function update(string $id, array $data): ?array
    {
        $animals = $this->all();
        if (!isset($animals[$id])) {
            throw AnimalNotFoundException::forId($id);
        }
        $animals[$id] = $data;
        $this->saveAnimals($animals);
        return ['id' => $id] + $data;
    }
    public function delete(string $id): bool
    {
        $animals = $this->all();
        if (!isset($animals[$id])) {
            throw AnimalNotFoundException::forId($id);
        }
        unset($animals[$id]);
        $this->saveAnimals($animals);
        return true;
    }
    public function reset(): void
    {
        $this->saveAnimals([]);
    }
}