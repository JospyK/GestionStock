@can('approvisionnement_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.approvisionnements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.approvisionnement.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.approvisionnement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userApprovisionnements">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.article') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.qte') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.total_ht') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.etape') }}
                        </th>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.user') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($approvisionnements as $key => $approvisionnement)
                        <tr data-entry-id="{{ $approvisionnement->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $approvisionnement->id ?? '' }}
                            </td>
                            <td>
                                {{ $approvisionnement->article->name ?? '' }}
                            </td>
                            <td>
                                {{ $approvisionnement->qte ?? '' }}
                            </td>
                            <td>
                                {{ $approvisionnement->total_ht ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Approvisionnement::ETAPE_RADIO[$approvisionnement->etape] ?? '' }}
                            </td>
                            <td>
                                {{ $approvisionnement->user->name ?? '' }}
                            </td>
                            <td>
                                @can('approvisionnement_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.approvisionnements.show', $approvisionnement->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('approvisionnement_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.approvisionnements.edit', $approvisionnement->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('approvisionnement_delete')
                                    <form action="{{ route('admin.approvisionnements.destroy', $approvisionnement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('approvisionnement_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.approvisionnements.massDestroy') }}",
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
  let table = $('.datatable-userApprovisionnements:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection