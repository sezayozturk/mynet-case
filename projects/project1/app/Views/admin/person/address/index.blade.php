@extends('admin/template/template')

@section('title',__('app.general_information').' / '.__('app.person'))

@section('content')
    <h2 class="az-dashboard-title">{{ __('app.person_informations') }}</h2>
    <p class="az-dashboard-text mb-2">Kişi İşlemleri Modülü</p>
    <div class="row">
        <div class="col-12 col-md-2">
            @include('admin/person/info',['person'=>$person])
        </div>
        <div class="col-12 col-md-2">
            @include('admin/person/menu',['person'=>$person, 'selected'=>'address_informations'])
        </div>
        <div class="col-12 col-md-8">
            <div class="az-dashboard-one-title">
                <div>
                    <h2 class="az-dashboard-title">{{ __('app.address_informations') }}</h2>
                    <p class="az-dashboard-text">Adres İşlemleri Modülü</p>
                </div>
                <div class="az-content-header-right">
                    {!! ButtonHelper::createButton(route('admin.person.address.create', $person),['dataMaxWidth' => '600px', 'dataMaxHeight' => '700px']) !!}
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped display nowrap" id="datatable">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">#</th>
                            <th data-priority="1">{{ __('app.type') }}</th>
                            <th data-priority="2">{{ __('app.address') }}</th>
                            <th data-priority="2">{{ __('app.post_code') }}</th>
                            <th data-priority="2">{{ __('app.country') }}</th>
                            <th data-priority="2">{{ __('app.city') }}</th>
                            <th data-priority="1"></th>
                            <th data-priority="1"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            var table = $('#datatable').DataTable({
                responsive: {
                    details: {
                        type: 'column'
                    }
                },
                search: false,
                processing: true,
                serverSide: true,
                order: [[1, 'asc']],
                pageLength: 25,
                autoWidth: false,
                language: {
                    url: "{{ asset('template/admin/lib/datatables/language/'.App::getLocale().'.json') }}",
                },
                ajax: {
                    url: "{{ route('admin.person.address.data',$person) }}",
                    data: function (d) {

                    }
                },
                columns: [
                    {
                        data: null,
                        class: "dtr-control",
                        orderable: false,
                        width: '22px',
                        defaultContent: ""
                    },
                    {
                        data: 'id',
                        name: 'id',
                        class: 'text-center'
                    },
                    {
                        data: 'type',
                        name: 'type',
                        class: 'text-center'
                    },
                    {
                        data: 'address',
                        name: 'address',
                        class: 'text-center'
                    },
                    {
                        data: 'post_code',
                        name: 'post_code',
                        class: 'text-center'
                    },
                    {
                        data: 'country_value',
                        name: 'country_value',
                        class: 'text-center',
                    },
                    {
                        data: 'city_value',
                        name: 'city_value',
                        class: 'text-center',
                    },
                    {
                        data: 'edit',
                        name: 'edit',
                        class: 'text-center',
                        width: '20px',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'delete',
                        name: 'delete',
                        class: 'text-center',
                        width: '20px',
                        orderable: false,
                        searchable: false
                    },
                ],
                "drawCallback": function (settings) {
                    customJS.init(table);
                }
            });
            customJS.init(table);
        });
    </script>
@endsection
