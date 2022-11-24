@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.factureDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.facture-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.factureDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $factureDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.factureDetail.fields.article') }}
                        </th>
                        <td>
                            {{ $factureDetail->article->reference ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.factureDetail.fields.description') }}
                        </th>
                        <td>
                            {{ $factureDetail->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.factureDetail.fields.num_serie') }}
                        </th>
                        <td>
                            {{ $factureDetail->num_serie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.factureDetail.fields.tva') }}
                        </th>
                        <td>
                            {{ $factureDetail->tva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.factureDetail.fields.qte') }}
                        </th>
                        <td>
                            {{ $factureDetail->qte }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.factureDetail.fields.total_ht') }}
                        </th>
                        <td>
                            {{ $factureDetail->total_ht }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.factureDetail.fields.total_tva') }}
                        </th>
                        <td>
                            {{ $factureDetail->total_tva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.factureDetail.fields.total_ttc') }}
                        </th>
                        <td>
                            {{ $factureDetail->total_ttc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.factureDetail.fields.user') }}
                        </th>
                        <td>
                            {{ $factureDetail->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.factureDetail.fields.facture') }}
                        </th>
                        <td>
                            {{ $factureDetail->facture->reference ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.facture-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection