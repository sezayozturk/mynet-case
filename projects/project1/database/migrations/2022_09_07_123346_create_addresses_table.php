<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
        {
            Schema::create('addresses', function (Blueprint $table) {
                $table->id();
                $table->foreignId('person_id')->constrained('people');
                $table->enum('type', ['home', 'business', 'other']);
                $table->string('address',500)->nullable();
                $table->string('post_code',10)->nullable();
                $table->unsignedBigInteger('country_id')->nullable();
                $table->unsignedBigInteger('city_id')->nullable();
                $table->timestamps();
            });
        }

    public function down()
        {
            Schema::dropIfExists('addresses');
        }
};
