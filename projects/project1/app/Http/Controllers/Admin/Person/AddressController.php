<?php

namespace App\Http\Controllers\Admin\Person;

use App\Helpers\ButtonHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddressRequest;
use App\Models\Address;
use App\Models\Country;
use App\Models\Person;
use App\Models\Setting\Module;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AddressController extends Controller
    {
        public function index(Person $person)
            {
                return view('admin.person.address.index', ['person' => $person]);
            }
        public function data(Person $person, Request $request)
            {
                $table = Address::query()
                                ->where('person_id', $person->id)
                                ->with(['country', 'city']);

                return DataTables::eloquent($table)
                                 ->filter(function ($query) {
                                 })
                                 ->editColumn('type', function ($row) {
                                     return $row->type_text;
                                 })
                                 ->addColumn('country_value', function ($row) {
                                     return isset($row->country->name) ? $row->country->name : '';
                                 })
                                 ->addColumn('city_value', function ($row) {
                                     return isset($row->city->name) ? $row->city->name : '';
                                 })
                                 ->addColumn('edit', function ($row) use ($person) {
                                     return ButtonHelper::editButton(route('admin.person.address.edit', ['person' => $person, 'address' => $row]), ['dataMaxWidth' => '600px', 'dataMaxHeight' => '700px']);
                                 })
                                 ->addColumn('delete', function ($row) {
                                     return ButtonHelper::deleteButton(route('admin.person.address.destroy', $row->id), $row->id);
                                 })
                                 ->rawColumns(['edit', 'delete'])
                                 ->make(TRUE);
            }

        // Create
        public function create(Person $person)
            {
                $countries = Cache::remember('country', 3600, function () {
                    return Country::get()->pluck('name', 'id')->toArray();
                });

                return view('admin.person.address.form', [
                    'function' => __FUNCTION__,
                    'nullPage' => true,
                    'person' => $person,
                    'countries' => $countries,
                ]);
            }
        public function store(Person $person, AddressRequest $request)
            {
                try {
                    $address = new Address(['person_id' => $person->id] + $request->validated());
                    $address->save();
                }
                catch (QueryException $e) {
                    return view('admin.template.message.error', ['nullPage' => 1, 'message' => $e->getMessage()]);
                }

                return view('admin.template.message.success', ['nullPage' => 1, 'functionName' => __FUNCTION__]);
            }

        // Edit
        public function edit(Person $person, Address $address)
            {
                $countries = Cache::remember('country', 3600, function () {
                    return Country::get()->pluck('name', 'id')->toArray();
                });

                return view('admin.person.address.form', [
                    'function' => __FUNCTION__,
                    'nullPage' => true,
                    'person' => $person,
                    'address' => $address,
                    'countries' => $countries,
                ]);
            }
        public function update(AddressRequest $request, Person $person, Address $address)
            {
                try {
                    $address->update($request->validated());
                }
                catch (QueryException $e) {
                    return view('admin.template.message.error', ['nullPage' => 1, 'message' => $e->getMessage()]);
                }

                return view('admin.template.message.success', ['nullPage' => 1, 'functionName' => __FUNCTION__]);
            }

        // Destroy
        public function destroy(Request $request)
            {
                $address = Address::where('id', $request->get('id'))->first();
                if (!$address) return response()->json(['status' => 'error', 'data' => null, 'message' => __('admin.no_result')], 412);

                try {
                    $address->delete();
                }
                catch (QueryException $e) {
                    return response()->json(['status' => 'error', 'data' => null, 'message' => $e->getMessage()], 412);
                }

                return response()->json(['status' => 'success', 'data' => null, 'message' => __('app.successfully_deleted')], 200);
            }
    }
