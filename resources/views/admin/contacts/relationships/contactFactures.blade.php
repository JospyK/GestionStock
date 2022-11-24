@can('facture_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.factures.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.facture.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.facture.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-contactFactures">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.facture.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.facture.fields.reference') }}
                        </th>
                        <th>
                            {{ trans('cruds.facture.fields.date_facture') }}
                        </th>
                        <th>
                            {{ trans('cruds.facture.fields.total_ht') }}
                        </th>
                        <th>
                            {{ trans('cruds.facture.fields.contact') }}
                        </th>
                        <th>
                            {{ trans('cruds.facture.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.facture.fields.etape') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($factures as $key => $facture)
                        <tr data-entry-id="{{ $facture->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $facture->id ?? '' }}
                            </td>
                            <td>
                                {{ $facture->reference ?? '' }}
                            </td>
                            <td>
                                {{ $facture->date_facture ?? '' }}
                            </td>
                            <td>
                                {{ $facture->total_ht ?? '' }}
                            </td>
                            <td>
                                {{ $facture->contact->name ?? '' }}
                            </td>
                            <td>
                                {{ $facture->user->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Facture::ETAPE_RADIO[$facture->etape] ?? '' }}
                            </td>
                            <td>
                                @can('facture_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.factures.show', $facture->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('facture_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.factures.edit', $facture->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('facture_delete')
                                    <form action="{{ route('admin.factures.destroy', $facture->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('facture_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.factures.massDestroy') }}",
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
  let table = $('.datatable-contactFactures:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection