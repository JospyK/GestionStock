@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.factureDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.facture-details.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="article_id">{{ trans('cruds.factureDetail.fields.article') }}</label>
                <select class="form-control select2 {{ $errors->has('article') ? 'is-invalid' : '' }}" name="article_id" id="article_id">
                    @foreach($articles as $id => $entry)
                        <option value="{{ $id }}" {{ old('article_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('article'))
                    <div class="invalid-feedback">
                        {{ $errors->first('article') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.factureDetail.fields.article_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.factureDetail.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.factureDetail.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="num_serie">{{ trans('cruds.factureDetail.fields.num_serie') }}</label>
                <input class="form-control {{ $errors->has('num_serie') ? 'is-invalid' : '' }}" type="text" name="num_serie" id="num_serie" value="{{ old('num_serie', '') }}">
                @if($errors->has('num_serie'))
                    <div class="invalid-feedback">
                        {{ $errors->first('num_serie') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.factureDetail.fields.num_serie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tva">{{ trans('cruds.factureDetail.fields.tva') }}</label>
                <input class="form-control {{ $errors->has('tva') ? 'is-invalid' : '' }}" type="number" name="tva" id="tva" value="{{ old('tva', '') }}" step="0.01">
                @if($errors->has('tva'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tva') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.factureDetail.fields.tva_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qte">{{ trans('cruds.factureDetail.fields.qte') }}</label>
                <input class="form-control {{ $errors->has('qte') ? 'is-invalid' : '' }}" type="number" name="qte" id="qte" value="{{ old('qte', '') }}" step="0.01">
                @if($errors->has('qte'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qte') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.factureDetail.fields.qte_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_ht">{{ trans('cruds.factureDetail.fields.total_ht') }}</label>
                <input class="form-control {{ $errors->has('total_ht') ? 'is-invalid' : '' }}" type="number" name="total_ht" id="total_ht" value="{{ old('total_ht', '') }}" step="0.01">
                @if($errors->has('total_ht'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_ht') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.factureDetail.fields.total_ht_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_tva">{{ trans('cruds.factureDetail.fields.total_tva') }}</label>
                <input class="form-control {{ $errors->has('total_tva') ? 'is-invalid' : '' }}" type="number" name="total_tva" id="total_tva" value="{{ old('total_tva', '') }}" step="0.01">
                @if($errors->has('total_tva'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_tva') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.factureDetail.fields.total_tva_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_ttc">{{ trans('cruds.factureDetail.fields.total_ttc') }}</label>
                <input class="form-control {{ $errors->has('total_ttc') ? 'is-invalid' : '' }}" type="number" name="total_ttc" id="total_ttc" value="{{ old('total_ttc', '') }}" step="0.01">
                @if($errors->has('total_ttc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_ttc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.factureDetail.fields.total_ttc_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
