<?php

namespace App\Http\Controllers;

use App\Models\Person;

class IndexController extends Controller
    {
        public function index()
            {
                $people = Person::orderBy('name')
                                ->orderBy('surname')
                                ->with([
                                    'address' => function ($query) {
                                        $query->with(['country', 'city']);
                                    }
                                ])
                                ->get();

                return view('index', ['people' => $people]);
            }
    }
