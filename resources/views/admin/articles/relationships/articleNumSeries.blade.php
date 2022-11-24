@can('num_serie_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.num-series.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.numSerie.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.numSerie.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-articleNumSeries">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.numSerie.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.numSerie.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.numSerie.fields.note') }}
                        </th>
                        <th>
                            {{ trans('cruds.numSerie.fields.article') }}
                        </th>
                        <th>
                            {{ trans('cruds.article.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.numSerie.fields.is_active') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($numSeries as $key => $numSerie)
                        <tr data-entry-id="{{ $numSerie->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $numSerie->id ?? '' }}
                            </td>
                            <td>
                                {{ $numSerie->name ?? '' }}
                            </td>
                            <td>
                                {{ $numSerie->note ?? '' }}
                            </td>
                            <td>
                                {{ $numSerie->article->name ?? '' }}
                            </td>
                            <td>
                                {{ $numSerie->article->name ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $numSerie->is_active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $numSerie->is_active ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('num_serie_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.num-series.show', $numSerie->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('num_serie_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.num-series.edit', $numSerie->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('num_serie_delete')
                                    <form action="{{ route('admin.num-series.destroy', $numSerie->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('num_serie_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.num-series.massDestroy') }}",
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
  let table = $('.datatable-articleNumSeries:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection