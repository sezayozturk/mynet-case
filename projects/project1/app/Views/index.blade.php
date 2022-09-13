<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Index</title>

    <link href="{{ asset('template/admin/lib/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/admin/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/admin/lib/typicons.font/typicons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/admin/lib/colorbox/theme/colorbox.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('template/admin/css/azia.css') }}">
</head>
<body class="az-body">
    <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">{{ __('app.people') }}</h2>
                        <p class="az-dashboard-text">Lorem Ipsum</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($people as $person)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                            <a href="#person-{{ $person->id }}" class="inline" title="{{ __('app.detail') }}">
                                <div class="text-center mb-4">
                                    <img
                                        src="https://api.lorem.space/image/face?w=300&h=300&hash={{ md5($person->id) }}"
                                        class="img-fluid mb-2">
                                    <h6 class="mb-0">{{ $person->full_name }}</h6>
                                    <div>
                                        <small>{{ $person->gender_text }}</small><br>
                                        <small>{{ $person->birthday_text }}</small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div style="display:none">
                    @foreach($people as $person)
                        <div id="person-{{ $person->id }}" style="padding:20px; background:#fff;">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <img
                                        src="https://api.lorem.space/image/face?w=300&h=300&hash={{ md5($person->id) }}"
                                        class="img-fluid mb-2">
                                    <h6 class="mb-0">{{ $person->full_name }}</h6>
                                    <div class="mb-2">
                                        <small>{{ $person->gender_text }}</small><br>
                                        <small>{{ $person->birthday_text }}</small>
                                    </div>
                                </div>
                                <div class="col-12 col-md-9">
                                    <h4 class="mb-2">{{ __('app.addresses') }}</h4>
                                    @if($person->address && $person->address->count())
                                        <ul>
                                            @foreach($person->address as $addres)
                                                <li>
                                                    <div class="d-flex mb-3">
                                                        <div style="width: 100px;">
                                                            {{ $addres->type_text }}
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            {{ $addres->address }}<br>
                                                            {{ $addres->post_code }}<br>
                                                            @if($addres->city)
                                                                {{ $addres->city->name }},
                                                            @endif
                                                            @if($addres->country)
                                                                {{ $addres->country->name }}
                                                            @endif
                                                        </div>
                                                    </div>

                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        Adres Bulunamamıştır
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="{{ asset('template/admin/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/admin/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/admin/lib/ionicons/ionicons.js') }}"></script>
    <script src="{{ asset('template/admin/js/jquery.cookie.js" type="text/javascript') }}"></script>
    <script src="{{ asset('template/admin/js/jquery.cookie.js" type="text/javascript') }}"></script>
    <script src="{{ asset('template/admin/lib/colorbox/colorbox-min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/admin/js/azia.js') }}"></script>
    <script>
        $(function () {
            $(".inline").colorbox({inline: true, width: "90%", 'maxWidth': '1000px'});
        });
    </script>
</body>
</html>
