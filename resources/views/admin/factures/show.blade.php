@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.facture.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.factures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.id') }}
                        </th>
                        <td>
                            {{ $facture->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.reference') }}
                        </th>
                        <td>
                            {{ $facture->reference }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.date_facture') }}
                        </th>
                        <td>
                            {{ $facture->date_facture }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.date_reglement') }}
                        </th>
                        <td>
                            {{ $facture->date_reglement }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.total_ht') }}
                        </th>
                        <td>
                            {{ $facture->total_ht }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.total_ttc') }}
                        </th>
                        <td>
                            {{ $facture->total_ttc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.note') }}
                        </th>
                        <td>
                            {{ $facture->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.contact') }}
                        </th>
                        <td>
                            {{ $facture->contact->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.user') }}
                        </th>
                        <td>
                            {{ $facture->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.is_locked') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $facture->is_locked ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.facture.fields.etape') }}
                        </th>
                        <td>
                            {{ App\Models\Facture::ETAPE_RADIO[$facture->etape] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.factures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection