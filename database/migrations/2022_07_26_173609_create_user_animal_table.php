<?php

use App\Models\Animal;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_animal', function (Blueprint $table) {
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Animal::class);
            $table->string('name');
            $table->unsignedInteger('age');
            $table->unsignedFloat('size');
            $table->timestamps();

            $table->primary(['user_id', 'animal_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_animal');
    }
};
