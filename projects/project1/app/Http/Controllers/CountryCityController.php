<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Setting\Module;
use App\Traits\ApiResponser;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CountryCityController extends Controller
    {
        use ApiResponser;

        public function citiesOfCountry(Request $request)
            {
                $id = $request->get('id');
                $selected = $request->get('selected');

                $cities = Cache::remember('country-'.$id.'-cities', 3600, function () use ($id) {
                    $country = Country::where('id', $id)
                                      ->with([
                                          'cities' => function ($query) {
                                              $query->select('country_id', 'id', 'name');
                                              $query->orderBy('name');
                                          }
                                      ])
                                      ->first();

                    return $country->cities ? $country->cities->pluck('name','id'):[];
                });

                return $this->successResponse($cities);
            }
    }
