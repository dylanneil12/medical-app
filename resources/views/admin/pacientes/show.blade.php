@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.paciente.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pacientes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.paciente.fields.id') }}
                        </th>
                        <td>
                            {{ $paciente->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paciente.fields.nombres') }}
                        </th>
                        <td>
                            {{ $paciente->nombres }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paciente.fields.apellidos') }}
                        </th>
                        <td>
                            {{ $paciente->apellidos }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paciente.fields.email') }}
                        </th>
                        <td>
                            {{ $paciente->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paciente.fields.telefono') }}
                        </th>
                        <td>
                            {{ $paciente->telefono }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paciente.fields.sexo') }}
                        </th>
                        <td>
                            {{ App\Paciente::SEXO_RADIO[$paciente->sexo] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paciente.fields.padecimiento') }}
                        </th>
                        <td>
                            {{ $paciente->padecimiento }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pacientes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection