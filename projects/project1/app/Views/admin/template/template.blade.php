<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') | Admin | Mynet</title>

    <link href="{{ asset('template/admin/lib/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/admin/lib/typicons.font/typicons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/admin/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/r-2.2.7/datatables.min.css"/>
    <link href="{{ asset('template/admin/lib/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/admin/lib/colorbox/theme/colorbox.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('template/admin/css/azia.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/css/custom.css') }}">
</head>
<body>
    @isset($nullPage)
        @yield('content')
    @else
        <div class="az-header">
            <div class="container-fluid">
                <div class="az-header-left">
                    <a href="{{ route('admin.index') }}" class="az-logo"><img src="{{ asset('template/admin/img/mynet-logo.png') }}" height="40px"></a>
                    <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
                </div>
                @include('admin.template.top_center_menu')
                <div class="az-header-right">
                    <div class="az-header-message">
                        <a href="javascript:;" title="{{ __('app.messages') }}">
                            <i class="typcn typcn-messages"></i>
                        </a>
                    </div>
                    @include('admin/template/topleft_menu_notification')
                    @include('admin/template/topleft_menu_profile')
                </div>
            </div>
        </div>
        <div class="az-content pd-y-20 pd-lg-y-30 pd-xl-y-40">
            <div class="container-fluid">
                <div class="az-content-body">
                    @yield('content')
                </div>
            </div>
        </div>
    @include('admin/template/footer')
    @endif

    <script src="{{ asset('template/admin/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/admin/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="//cdn.datatables.net/v/bs4/dt-1.10.23/r-2.2.7/datatables.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/plug-ins/1.11.4/sorting/turkish-string.js" type="text/javascript"></script>
    <script src="{{ asset('template/admin/lib/sweetalert2/dist/sweetalert2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/admin/lib/colorbox/colorbox-min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('template/admin/js/cookie.js') }}"></script>
    <script src="{{ asset('template/admin/js/azia.js') }}"></script>
    @yield('scriptFile')
    <script>
        var loading  = '<div class="text-center"><img src="{{ asset('template/admin/img/loading.gif') }}"></div>';

        var customJS = (function () {
            var colorBoxInit = function (table) {
                $(".iframe").colorbox({
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
                        if ($(this).data('function-name') == 'edit') table.draw(false);
                        else if ($(this).data('function-name') == 'image') table.draw(false);
                        else table.draw();
                    },
                    title: function () {
                        return $(this).attr('alt');
                    }
                });
            }
            var deleteButtonInit = function (table){
                $(".delete").click(function (e) {
                    Swal.fire({
                        title: '{{ __('app.are_you_sure_to_delete') }}',
                        type: 'error',
                        showCancelButton: true,
                        confirmButtonColor: '#ee2738',
                        cancelButtonColor: '#444444',
                        confirmButtonText: '{{ __('app.yes') }}',
                        cancelButtonText: '{{ __('app.cancel') }}'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: $(this).data('link'),
                                type: 'delete',
                                dataType: 'JSON',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    id: $(this).data('id'),
                                },
                                success: (data) => {
                                    table.draw(false);
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: '{{ __('app.delete') }}',
                                        text: data.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                },
                                error: (data) => {
                                    var message = $.parseJSON(data.responseText).message;

                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'error',
                                        title: '{{ __('app.error') }}',
                                        text: message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                }
                            });
                        }
                    });
                });
            }
            return {
                init: function (table) {
                    colorBoxInit(table);
                    deleteButtonInit(table);
                }
            }
        })();

        var datatableFilterJS = function (table) {
            $(".filterButton").click(function (e) {
                table.draw();
            });

            $('.filterArea input').on('keydown', function (e) {
                if (e.which == 13) {
                    table.draw();
                }
            });

            $('.filterArea select').on('change', function (e) {
                table.draw();
            });

            $(".filterArea .clear").click(function (e) {
                $(".filterArea input").val('');
                $(".filterArea select").val('');
                $(".filterArea textarea").val('');
                table.draw();
            });
        }

        $(document).bind('cbox_open', function () {
            $('html').css({overflow: 'hidden'});
        }).bind('cbox_closed', function () {
            $('html').css({overflow: 'auto'});
        });

    </script>
    @yield('script')
</body>
</html>
