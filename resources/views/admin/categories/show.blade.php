@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.categorie.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.categorie.fields.id') }}
                        </th>
                        <td>
                            {{ $categorie->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categorie.fields.name') }}
                        </th>
                        <td>
                            {{ $categorie->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categorie.fields.description') }}
                        </th>
                        <td>
                            {{ $categorie->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.categorie.fields.color') }}
                        </th>
                        <td>
                            {{ $categorie->color }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#categorie_articles" role="tab" data-toggle="tab">
                {{ trans('cruds.article.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="categorie_articles">
            @includeIf('admin.categories.relationships.categorieArticles', ['articles' => $categorie->categorieArticles])
        </div>
    </div>
</div>

@endsection