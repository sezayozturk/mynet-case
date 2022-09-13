@extends('admin/template/template')

@section('title',__('app.people'))

@section('content')
    <div class="az-dashboard-one-title">
        <div>
            <h2 class="az-dashboard-title">{{ __('app.people') }}</h2>
            <p class="az-dashboard-text">Kullanıcı İşlemleri Modülü</p>
        </div>
        <div class="az-content-header-right">
            {!! ButtonHelper::createButton(route('admin.person.create')) !!}
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped display nowrap" id="datatable">
            <thead>
                <tr>
                    <th></th>
                    <th class="text-center">#</th>
                    <th data-priority="1">{{ __('app.name') }}</th>
                    <th data-priority="1">{{ __('app.surname') }}</th>
                    <th>{{ __('app.gender') }}</th>
                    <th>{{ __('app.birthday') }}</th>
                    <th data-priority="1"></th>
                    <th data-priority="1"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
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
                    url: "{{ route('admin.person.data') }}",
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
                        data: 'name',
                        name: 'name',
                        class: 'text-center'
                    },
                    {
                        data: 'surname',
                        name: 'surname',
                        class: 'text-center'
                    },
                    {
                        data: 'gender',
                        name: 'gender',
                        class: 'text-center'
                    },
                    {
                        data: 'birthday',
                        name: 'birthday',
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
