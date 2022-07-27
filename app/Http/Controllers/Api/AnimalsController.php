<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    public function getKinds(): JsonResponse
    {
        $kinds = Animal::all()->map(function ($item) {
            $item['image'] = env('APP_URL') . '/images/' . $item->kind . '.svg';
            return $item;
        });

        return response()->json($kinds);
    }

    public function getUserAnimals(): JsonResponse
    {
        $animals = auth()->user()->animals->map(function ($animal) {
            return [
                'kind' => $animal['kind'],
                'max_size' => $animal['max_size'],
                'id' => $animal['id'],
                'size' => $animal['pivot']['size']
            ];
        });

        return response()->json($animals);
    }

    public function createNew(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $animalId = $request->get('animal_id');

        $user->animals()->attach($animalId, [
            'size' => 0,
            'age' => 0,
            'name' => 'Test'
        ]);

        $animal = Animal::find($animalId);

        $result = [
            'id' => $animalId,
            'kind' => $animal->kind,
            'max_size' => $animal->kind,
            'size' => $animal->size
        ];

        return response()->json($result);
    }
}
