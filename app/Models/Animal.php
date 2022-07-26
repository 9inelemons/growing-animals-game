<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Animal extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_animal')
            ->withPivot('name', 'age', 'size')->withTimestamps();
    }
}
