@extends('layouts.admin')
@section('content')
@can('facture_detail_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.facture-details.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.factureDetail.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.factureDetail.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-FactureDetail">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.factureDetail.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.factureDetail.fields.article') }}
                    </th>
                    <th>
                        {{ trans('cruds.factureDetail.fields.num_serie') }}
                    </th>
                    <th>
                        {{ trans('cruds.factureDetail.fields.tva') }}
                    </th>
                    <th>
                        {{ trans('cruds.factureDetail.fields.qte') }}
                    </th>
                    <th>
                        {{ trans('cruds.factureDetail.fields.total_ht') }}
                    </th>
                    <th>
                        {{ trans('cruds.factureDetail.fields.total_ttc') }}
                    </th>
                    <th>
                        {{ trans('cruds.factureDetail.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.factureDetail.fields.facture') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('facture_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.facture-details.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.facture-details.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'article_reference', name: 'article.reference' },
{ data: 'num_serie', name: 'num_serie' },
{ data: 'tva', name: 'tva' },
{ data: 'qte', name: 'qte' },
{ data: 'total_ht', name: 'total_ht' },
{ data: 'total_ttc', name: 'total_ttc' },
{ data: 'user_name', name: 'user.name' },
{ data: 'facture_reference', name: 'facture.reference' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-FactureDetail').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection