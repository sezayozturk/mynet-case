@extends('admin.template.template')
@section('title',__('app.error'))
@section('content')
    <div class="vh-100 d-flex flex-column justify-content-center align-items-center bg-danger-light text-dark">
        <div>
            <i class="typcn typcn-warning-outline" style="font-size: 75px; line-height: 50px;"></i>
        </div>
        <div class="fs-35">{{__('app.error')}}</div>
        <div class="fs-15">
            @isset($message)
                {{ $message }}
            @endif
        </div>
    </div>
@endsection
