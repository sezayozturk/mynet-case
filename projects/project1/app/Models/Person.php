<?php

namespace App\Models;

use App\Models\Product\ProductGroup;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
    {
        use HasFactory;

        protected $fillable = [
            'name',
            'surname',
            'birthday',
            'gender',
        ];

        protected $appends = [
            'full_name', 'gender_text','birthday_text'
        ];

        public function address(){
            return $this->hasMany(Address::class);
        }

        public function getFullNameAttribute(){
            return $this->name . ' ' . $this->surname;
        }

        public function getGenderTextAttribute(){
            return $this->gender ? __('app.'.$this->gender):'';
        }
        public function getBirthdayTextAttribute(){
            $return = '';
            if($this->birthday){
                $translatedFormat = 'd F Y';
                if(app()->getLocale()=='en') $translatedFormat = 'f d Y';

                $return = Carbon::createFromDate($this->birthday)->translatedFormat($translatedFormat);
            }

            return $return;
        }
    }
