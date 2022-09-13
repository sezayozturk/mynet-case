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
            @include('admin/person/menu',['person'=>$person, 'selected'=>'general_information'])
        </div>
        <div class="col-12 col-md-8">
            <h2 class="az-dashboard-title">{{ __('app.general_information') }}</h2>
            <hr>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="mb-1">{{ __('app.name') }} {{ __('app.surname') }}</div>
                    <div class="border bg-light p-2 input-area full_name"></div>
                </div>
                <div class="col-12 col-md-4">
                    <div>{{ __('app.gender') }}</div>
                    <div class="border bg-light p-2 input-area gender"></div>
                </div>
                <div class="col-12 col-md-4">
                    <div>{{ __('app.birthday') }}</div>
                    <div class="border bg-light p-2 input-area birthday"></div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-sm-6 col-md-2">
                    {!! \App\Helpers\ButtonHelper::editButtonBig(route('admin.person.edit',$person)) !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(function () {

            function getPersonData(){
                $.ajax({
                    type: "POST",
                    url: '{{ route('admin.person.data') }}',
                    dataType: 'json',
                    beforeSend: function() {
                        $('.input-area').html(loading);
                    },
                    data: {
                        _token  : '{{ csrf_token() }}',
                        id      :'{{ $person->id }}'
                    },
                    success: function(response){
                        var data = response.data;
                        $('.full_name').html(data.full_name);
                        $('.gender').html(data.gender_text);
                        $('.birthday').html(data.birthday_text);
                    }
                });
            }
            getPersonData();

            $(".update").colorbox({
                iframe: true,
                transition: 'none',
                width: '90%',
                height: '90%',
                maxWidth: function () {
                    return $(this).data('max-width') ? $(this).data('max-width') : 600;
                },
                maxHeight: function () {
                    return $(this).data('max-height') ? $(this).data('max-height') : 500;
                },
                searching: true,
                onClosed: function () {
                    getPersonData();
                },
                title: function () {
                    return $(this).attr('alt');
                }
            });
        });
    </script>
@endsection
