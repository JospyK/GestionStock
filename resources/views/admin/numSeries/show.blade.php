@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.numSerie.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.num-series.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.numSerie.fields.id') }}
                        </th>
                        <td>
                            {{ $numSerie->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.numSerie.fields.name') }}
                        </th>
                        <td>
                            {{ $numSerie->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.numSerie.fields.note') }}
                        </th>
                        <td>
                            {{ $numSerie->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.numSerie.fields.article') }}
                        </th>
                        <td>
                            {{ $numSerie->article->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.numSerie.fields.is_active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $numSerie->is_active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.num-series.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection