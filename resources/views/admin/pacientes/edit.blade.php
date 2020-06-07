@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.paciente.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pacientes.update", [$paciente->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nombres">{{ trans('cruds.paciente.fields.nombres') }}</label>
                <input class="form-control {{ $errors->has('nombres') ? 'is-invalid' : '' }}" type="text" name="nombres" id="nombres" value="{{ old('nombres', $paciente->nombres) }}">
                @if($errors->has('nombres'))
                    <span class="text-danger">{{ $errors->first('nombres') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paciente.fields.nombres_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="apellidos">{{ trans('cruds.paciente.fields.apellidos') }}</label>
                <input class="form-control {{ $errors->has('apellidos') ? 'is-invalid' : '' }}" type="text" name="apellidos" id="apellidos" value="{{ old('apellidos', $paciente->apellidos) }}">
                @if($errors->has('apellidos'))
                    <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paciente.fields.apellidos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.paciente.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $paciente->email) }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paciente.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefono">{{ trans('cruds.paciente.fields.telefono') }}</label>
                <input class="form-control {{ $errors->has('telefono') ? 'is-invalid' : '' }}" type="text" name="telefono" id="telefono" value="{{ old('telefono', $paciente->telefono) }}">
                @if($errors->has('telefono'))
                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paciente.fields.telefono_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.paciente.fields.sexo') }}</label>
                @foreach(App\Paciente::SEXO_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('sexo') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="sexo_{{ $key }}" name="sexo" value="{{ $key }}" {{ old('sexo', $paciente->sexo) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="sexo_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('sexo'))
                    <span class="text-danger">{{ $errors->first('sexo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paciente.fields.sexo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="padecimiento">{{ trans('cruds.paciente.fields.padecimiento') }}</label>
                <textarea class="form-control {{ $errors->has('padecimiento') ? 'is-invalid' : '' }}" name="padecimiento" id="padecimiento">{{ old('padecimiento', $paciente->padecimiento) }}</textarea>
                @if($errors->has('padecimiento'))
                    <span class="text-danger">{{ $errors->first('padecimiento') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.paciente.fields.padecimiento_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection