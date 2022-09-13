@extends('admin.template.template')
@section('title',$function=='create' ? __('app.create').' - '.__('app.person'):__('app.edit').' - '.__('app.person'))
@section('content')
    @if($function=='create')
        {{ Form ::open(['url' => route('admin.person.store'), 'class'=>'height-100-100', 'id'=>'personForm']) }}
    @else
        {{ Form ::open(['url' => route('admin.person.update',$person), 'class'=>'height-100-100', 'id'=>'personForm']) }}
    @endif
    <div class="d-flex flex-column align-content-between vh-100">
        <div class="flex-grow-1 pd-20">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {{ Form::label('name',__('app.name')) }}
                        {{ Form::text('name', $function=='edit' ? $person->name:null, ['class'=>'form-control']) }}
                        @error('name')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{ Form::label('surname',__('app.surname')) }}
                        {{ Form::text('surname', $function=='edit' ? $person->surname:null, ['class'=>'form-control']) }}
                        @error('surname')
                            <div class="form-error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('gender',__('app.gender')) }}
                {{ Form::select('gender', [null =>'-', 'female' =>__('app.female'),'male'=>__('app.male')], $function=='edit' ? $person->gender:null, ['class'=>'form-control']) }}
                @error('gender')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                {{ Form::label('birthday',__('app.birthday')) }}
                {{ Form::date('birthday', $function=='edit' ? $person->birthday:0, ['class'=>'form-control']) }}
                @error('birthday')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {!! ButtonHelper::formSubmitButton() !!}
    </div>
    {{ Form::close() }}
@endsection
