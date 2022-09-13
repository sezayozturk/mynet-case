<?php

namespace App\Http\Requests\Admin;

use App\Models\City;
use App\Models\Country;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddressRequest extends FormRequest
    {
        public function authorize()
            {
                return true;
            }

        public function rules()
            {
                return [
                    'type' => ['required', Rule::in(['home', 'business', 'other'])],
                    'address' => ['required', 'max:500'],
                    'post_code' => ['required', 'max:10'],
                    'country_id' => ['required', Rule::exists(Country::class, 'id')],
                    'city_id' => ['required', Rule::exists(City::class, 'id')],
                ];
            }

        public function attributes()
            {
                return [
                    'type' => __('app.type'),
                    'address' => __('app.address'),
                    'post_code' => __('app.post_code'),
                    'country_id' => __('app.country'),
                    'city_id' => __('app.city'),
                ];
            }
    }
