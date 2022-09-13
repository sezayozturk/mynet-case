<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonRequest extends FormRequest
    {
        public function authorize()
            {
                return true;
            }

        public function rules()
            {
                return [
                    'name' => ['required', 'max:50'],
                    'surname' => ['required', 'max:50'],
                    'gender' => ['required', 'max:50', Rule::in(['male', 'female'])],
                    'birthday' => ['required', 'date_format:Y-m-d'],
                ];
            }

        public function attributes()
            {
                return [
                    'name' => __('app.name'),
                    'surname' => __('app.surname'),
                    'gender' => __('app.gender'),
                    'birthday' => __('app.birthday'),
                ];
            }
    }
