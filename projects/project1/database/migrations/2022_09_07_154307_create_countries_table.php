<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
        {
            Schema::create('countries', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->string('short_name', 2);
                $table->string('short_name_3', 3);
                $table->string('code', 6);
            });
        }

    public function down()
        {
            Schema::dropIfExists('countries');
        }
};
