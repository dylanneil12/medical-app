@extends('layouts.admin')
@section('content')
@can('paciente_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pacientes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.paciente.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.paciente.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Paciente">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.paciente.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.paciente.fields.nombres') }}
                        </th>
                        <th>
                            {{ trans('cruds.paciente.fields.apellidos') }}
                        </th>
                        <th>
                            {{ trans('cruds.paciente.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.paciente.fields.telefono') }}
                        </th>
                        <th>
                            {{ trans('cruds.paciente.fields.sexo') }}
                        </th>
                        <th>
                            {{ trans('cruds.paciente.fields.padecimiento') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pacientes as $key => $paciente)
                        <tr data-entry-id="{{ $paciente->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $paciente->id ?? '' }}
                            </td>
                            <td>
                                {{ $paciente->nombres ?? '' }}
                            </td>
                            <td>
                                {{ $paciente->apellidos ?? '' }}
                            </td>
                            <td>
                                {{ $paciente->email ?? '' }}
                            </td>
                            <td>
                                {{ $paciente->telefono ?? '' }}
                            </td>
                            <td>
                                {{ App\Paciente::SEXO_RADIO[$paciente->sexo] ?? '' }}
                            </td>
                            <td>
                                {{ $paciente->padecimiento ?? '' }}
                            </td>
                            <td>
                                @can('paciente_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pacientes.show', $paciente->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('paciente_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pacientes.edit', $paciente->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('paciente_delete')
                                    <form action="{{ route('admin.pacientes.destroy', $paciente->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('paciente_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pacientes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Paciente:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection