<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
    {
        use HasFactory;

        protected $appends = ['type_text'];

        protected $fillable = [
            'person_id',
            'type',
            'address',
            'post_code',
            'country_id',
            'city_id',
        ];

        public function getTypeTextAttribute(){
            return __('app.'.$this->type);
        }

        public function country(){
            return $this->belongsTo(Country::class);
        }

        public function city(){
            return $this->belongsTo(City::class);
        }
    }
