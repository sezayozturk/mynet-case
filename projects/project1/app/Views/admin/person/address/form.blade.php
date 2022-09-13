@extends('admin.template.template')
@section('title',$function=='create' ? __('app.create').' - '.__('app.address') : __('app.edit').' - '.__('app.address'))
@section('content')
    @if($function=='create')
        {{ Form ::open(['url' => route('admin.person.address.store',$person), 'class'=>'height-100-100', 'id'=>'addressForm']) }}
    @else
        {{ Form ::open(['url' => route('admin.person.address.update',['person'=>$person, 'address'=>$address]), 'class'=>'height-100-100', 'id'=>'addressForm']) }}
    @endif
    <div class="d-flex flex-column align-content-between vh-100">
        <div class="flex-grow-1 pd-20">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{ Form::label('type',__('app.type')) }}
                        {{ Form::select('type', [null=>'', 'home'=>__('app.home'),'business'=>__('app.business'), 'other'=>__('app.other')],$function=='edit' ? $address->type:null, ['class'=>'form-control']) }}
                        @error('type')
                        <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('address',__('app.address')) }}
                        {{ Form::textarea('address', $function=='edit' ? $address->address:null, ['class'=>'form-control' ,'rows'=>3]) }}
                        @error('address')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('post_code',__('app.post_code')) }}
                        {{ Form::text('post_code', $function=='edit' ? $address->post_code:null, ['class'=>'form-control']) }}
                        @error('post_code')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('country_id',__('app.country')) }}
                        {{ Form::select('country_id', [null=>''] + $countries, $function=='edit' ? $address->country_id:212, ['class'=>'form-control', 'id'=> 'country_id']) }}
                        @error('country_id')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('city_id',__('app.city')) }}
                        {{ Form::select('city_id', [null=>''], $function=='edit' ? $address->city_id:null, ['class'=>'form-control', 'id'=> 'city_id']) }}
                        @error('city_id')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        {!! ButtonHelper::formSubmitButton() !!}
    </div>
    {{ Form::close() }}
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#country_id").change(function () {
                $('#city_id').empty();
                $('#city_id').append('<option selected="selected" value=""></option>');

                $.ajax({
                    url: '{{ route('citiesOfCountry') }}',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: $(this).val(),
                        selected: '{{ $function=='edit' ? $address->city_id:null }}',
                    },
                    success: (response) => {
                        $.each(response.data, function (key, value) {
                            $('#city_id').append('<option value="' + key + '">' + value + '</option>');

                        });
                        $('#city_id').val({{ $function=='edit' ? $address->city_id:null }});
                    }
                })
            })
            $('#country_id').change();
        });
    </script>
@endsection
