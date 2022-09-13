<?php

namespace App\Http\Controllers\Admin\Person;

use App\Helpers\ButtonHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PersonRequest;
use App\Imports\UsersImport;
use App\Models\Person;
use App\Models\Setting\Module;
use App\Traits\ApiResponser;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class PersonController extends Controller
    {
        use ApiResponser;

        public function index()
            {
                return view('admin.person.index');
            }

        public function data(Request $request)
            {
                if ($request->has('id')) {
                    $person = Person::find($request->get('id'));
                    if ($person) {
                        return $this->successResponse($person);
                    }
                    else {
                        return $this->successResponse([]);
                    }
                }
                else {
                    return DataTables::eloquent(Person::query())
                                     ->filter(function ($query) {
                                         //if (request()->has('role') and request('role')) $query->where('role', request('role'));
                                     })
                                     ->editColumn('gender', function ($row) {
                                         return __('app.' . $row->gender);
                                     })
                                     ->editColumn('birthday', function ($row) {
                                         return $row->birthday ? Carbon::createFromDate($row->birthday)->translatedFormat('d F Y') : '-';
                                     })
                                     ->addColumn('edit', function ($row) {
                                         return ButtonHelper::otherButton(route('admin.person.generalInformation.index', $row->id), ['icon' => 'typcn typcn-edit', 'title' => __('app.edit')]);
                                     })
                                     ->addColumn('delete', function ($row) {
                                         return ButtonHelper::deleteButton(route('admin.person.destroy', $row->id), $row->id);
                                     })
                                     ->rawColumns(['edit', 'delete'])
                                     ->make(TRUE);
                }
            }

    // Create
        public function create()
            {
                return view('admin.person.form', array(
                    'function' => __FUNCTION__,
                    'nullPage' => true
                ));
            }

        public function store(PersonRequest $request)
            {
                try {
                    $person = new Person($request->validated());
                    $person->save();
                }
                catch (QueryException $e) {
                    return view('admin.template.message.error', ['nullPage' => 1, 'message' => $e->getMessage()]);
                }

                return view('admin.template.message.success', ['nullPage' => 1, 'functionName' => __FUNCTION__]);
            }

    // Edit
        public function edit(Person $person)
            {
                return view('admin.person.form', [
                    'function' => __FUNCTION__,
                    'nullPage' => true,
                    'person' => $person,
                ]);
            }

        public function update(PersonRequest $request, Person $person)
            {
                try {
                    $person->update($request->validated());
                }
                catch (QueryException $e) {
                    return view('admin.template.message.error', ['nullPage' => 1, 'message' => $e->getMessage()]);
                }

                return view('admin.template.message.success', ['nullPage' => 1, 'functionName' => __FUNCTION__]);
            }

    // Destroy
        public function destroy(Request $request)
            {
                $person = Person::where('id', $request->get('id'))->first();
                if (!$person) return response()->json(['status' => 'error', 'data' => null, 'message' => __('admin.no_result')], 412);

                try {
                    $person->delete();
                }
                catch (QueryException $e) {
                    return response()->json(['status' => 'error', 'data' => null, 'message' => $e->getMessage()], 412);
                }

                return response()->json(['status' => 'success', 'data' => null, 'message' => __('app.successfully_deleted')], 200);
            }
    }
