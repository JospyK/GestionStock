@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.approvisionnement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.approvisionnements.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="article_id">{{ trans('cruds.approvisionnement.fields.article') }}</label>
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
                <span class="help-block">{{ trans('cruds.approvisionnement.fields.article_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="num_serie">{{ trans('cruds.approvisionnement.fields.num_serie') }}</label>
                <textarea class="form-control {{ $errors->has('num_serie') ? 'is-invalid' : '' }}" name="num_serie" id="num_serie">{{ old('num_serie') }}</textarea>
                @if($errors->has('num_serie'))
                    <div class="invalid-feedback">
                        {{ $errors->first('num_serie') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvisionnement.fields.num_serie_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.approvisionnement.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvisionnement.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qte">{{ trans('cruds.approvisionnement.fields.qte') }}</label>
                <input class="form-control {{ $errors->has('qte') ? 'is-invalid' : '' }}" type="number" name="qte" id="qte" value="{{ old('qte', '') }}" step="0.01">
                @if($errors->has('qte'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qte') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvisionnement.fields.qte_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_ht">{{ trans('cruds.approvisionnement.fields.total_ht') }}</label>
                <input class="form-control {{ $errors->has('total_ht') ? 'is-invalid' : '' }}" type="number" name="total_ht" id="total_ht" value="{{ old('total_ht', '') }}" step="0.01">
                @if($errors->has('total_ht'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_ht') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvisionnement.fields.total_ht_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_tva">{{ trans('cruds.approvisionnement.fields.total_tva') }}</label>
                <input class="form-control {{ $errors->has('total_tva') ? 'is-invalid' : '' }}" type="number" name="total_tva" id="total_tva" value="{{ old('total_tva', '') }}" step="0.01">
                @if($errors->has('total_tva'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_tva') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvisionnement.fields.total_tva_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_ttc">{{ trans('cruds.approvisionnement.fields.total_ttc') }}</label>
                <input class="form-control {{ $errors->has('total_ttc') ? 'is-invalid' : '' }}" type="number" name="total_ttc" id="total_ttc" value="{{ old('total_ttc', '') }}" step="0.01">
                @if($errors->has('total_ttc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_ttc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvisionnement.fields.total_ttc_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.approvisionnement.fields.etape') }}</label>
                @foreach(App\Models\Approvisionnement::ETAPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('etape') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="etape_{{ $key }}" name="etape" value="{{ $key }}" {{ old('etape', '0') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="etape_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('etape'))
                    <div class="invalid-feedback">
                        {{ $errors->first('etape') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvisionnement.fields.etape_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.approvisionnement.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.approvisionnement.fields.user_helper') }}</span>
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