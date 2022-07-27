<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\JsonResponse;

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
}
