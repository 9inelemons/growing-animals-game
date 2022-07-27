<?php

namespace App\Jobs;

use App\Events\AnimalGrowedEvent;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GrowAnimalsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        User::query()->get()->each(function (User $user) {
           foreach ($user->animals as $animal) {
               if ($animal->pivot->age < $animal->max_age)
               {
                   $growData = [
                       'age' => $animal->pivot->age + 1,
                       'size' => $animal->pivot->size + 1 * ($animal->growth_factor)
                   ];
                   $user->animals()->updateExistingPivot($animal->pivot->animal_id, $growData);

                   $eventData = [
                       'age' => $growData['age'],
                       'size' => $growData['size'],
                       'kind' => $animal->kind,
                       'user_id' => $user->id,
                   ];

                   event(new AnimalGrowedEvent($eventData));
               }
           }
        });
    }
}
