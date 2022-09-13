<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
        {
            Schema::create('cities', function (Blueprint $table) {
                $table->unsignedBigInteger('country_id')->index();
                $table->id();
                $table->string('name', 100);
                $table->string('plate_no', 2);
                $table->string('phone_code', 7);
            });
        }

    public function down()
        {
            Schema::dropIfExists('cities');
        }
};
