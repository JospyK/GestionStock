@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.article.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.articles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.id') }}
                        </th>
                        <td>
                            {{ $article->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.reference') }}
                        </th>
                        <td>
                            {{ $article->reference }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.name') }}
                        </th>
                        <td>
                            {{ $article->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.prix_min') }}
                        </th>
                        <td>
                            {{ $article->prix_min }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.prix_ht') }}
                        </th>
                        <td>
                            {{ $article->prix_ht }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.prix_ttc') }}
                        </th>
                        <td>
                            {{ $article->prix_ttc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.tva') }}
                        </th>
                        <td>
                            {{ $article->tva }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.stock_actuel') }}
                        </th>
                        <td>
                            {{ $article->stock_actuel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.stock_seuil') }}
                        </th>
                        <td>
                            {{ $article->stock_seuil }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.stock_virtuel') }}
                        </th>
                        <td>
                            {{ $article->stock_virtuel }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.stock_physique') }}
                        </th>
                        <td>
                            {{ $article->stock_physique }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.description') }}
                        </th>
                        <td>
                            {!! $article->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.note') }}
                        </th>
                        <td>
                            {{ $article->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.tosell') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $article->tosell ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.tobuy') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $article->tobuy ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.categorie') }}
                        </th>
                        <td>
                            @foreach($article->categories as $key => $categorie)
                                <span class="label label-info">{{ $categorie->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.is_active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $article->is_active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.photo') }}
                        </th>
                        <td>
                            @foreach($article->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.articles.index') }}">
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
            <a class="nav-link" href="#article_num_series" role="tab" data-toggle="tab">
                {{ trans('cruds.numSerie.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="article_num_series">
            @includeIf('admin.articles.relationships.articleNumSeries', ['numSeries' => $article->articleNumSeries])
        </div>
    </div>
</div>

@endsection