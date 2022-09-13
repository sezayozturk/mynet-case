<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
    {
        protected $guarded = [];
        public $timestamps = false;

        public function cities()
            {
                return $this->hasMany(City::class);
            }
    }
