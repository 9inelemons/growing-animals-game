<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;

class AnimalsController extends Controller
{
    public function getKinds()
    {
        $kinds = Animal::all()->map(function ($item) {
            $item['image'] = env('APP_URL') . '/images/' . $item->kind . '.svg';
            return $item;
        });

        return response()->json($kinds);
    }
}
