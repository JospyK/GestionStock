@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.approvisionnement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.approvisionnements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.id') }}
                        </th>
                        <td>
                            {{ $approvisionnement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.article') }}
                        </th>
                        <td>
                            {{ $approvisionnement->article->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.num_serie') }}
                        </th>
                        <td>
                            {{ $approvisionnement->num_serie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.description') }}
                        </th>
                        <td>
                            {{ $approvisionnement->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.qte') }}
                        </th>
                        <td>
                            {{ $approvisionnement->qte }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.total_ht') }}
                        </th>
                        <td>
                            {{ $approvisionnement->total_ht }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.total_tva') }}
                        </th>
                        <td>
                            {{ $approvisionnement->total_tva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.total_ttc') }}
                        </th>
                        <td>
                            {{ $approvisionnement->total_ttc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.etape') }}
                        </th>
                        <td>
                            {{ App\Models\Approvisionnement::ETAPE_RADIO[$approvisionnement->etape] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.approvisionnement.fields.user') }}
                        </th>
                        <td>
                            {{ $approvisionnement->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.approvisionnements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection