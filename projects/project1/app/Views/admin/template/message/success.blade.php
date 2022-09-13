@extends('admin.template.template')
@section('title',__('app.success'))
@section('content')
    <div class="vh-100 d-flex flex-column justify-content-center align-items-center bg-success-light text-dark">
        <div>
            <i class="typcn typcn-input-checked" style="font-size: 75px; line-height: 50px;"></i>
        </div>
        <div style="font-size: 35px">{{__('app.success')}}</div>
        <div style="font-size: 18px">
            @if($functionName=='create' or $functionName=='store')
                {{__('app.successfully_created')}}
            @elseif($functionName=='edit' or $functionName=='update')
                {{__('app.successfully_updated')}}
            @endif
        </div>
    </div>
@endsection

