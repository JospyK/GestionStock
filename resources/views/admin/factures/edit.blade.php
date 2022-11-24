@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.facture.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.factures.update", [$facture->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="reference">{{ trans('cruds.facture.fields.reference') }}</label>
                <input class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{ old('reference', $facture->reference) }}">
                @if($errors->has('reference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.reference_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_facture">{{ trans('cruds.facture.fields.date_facture') }}</label>
                <input class="form-control datetime {{ $errors->has('date_facture') ? 'is-invalid' : '' }}" type="text" name="date_facture" id="date_facture" value="{{ old('date_facture', $facture->date_facture) }}">
                @if($errors->has('date_facture'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_facture') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.date_facture_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_reglement">{{ trans('cruds.facture.fields.date_reglement') }}</label>
                <input class="form-control datetime {{ $errors->has('date_reglement') ? 'is-invalid' : '' }}" type="text" name="date_reglement" id="date_reglement" value="{{ old('date_reglement', $facture->date_reglement) }}">
                @if($errors->has('date_reglement'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_reglement') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.date_reglement_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_ht">{{ trans('cruds.facture.fields.total_ht') }}</label>
                <input class="form-control {{ $errors->has('total_ht') ? 'is-invalid' : '' }}" type="number" name="total_ht" id="total_ht" value="{{ old('total_ht', $facture->total_ht) }}" step="0.01">
                @if($errors->has('total_ht'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_ht') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.total_ht_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_ttc">{{ trans('cruds.facture.fields.total_ttc') }}</label>
                <input class="form-control {{ $errors->has('total_ttc') ? 'is-invalid' : '' }}" type="number" name="total_ttc" id="total_ttc" value="{{ old('total_ttc', $facture->total_ttc) }}" step="0.01">
                @if($errors->has('total_ttc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_ttc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.total_ttc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.facture.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note', $facture->note) }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_id">{{ trans('cruds.facture.fields.contact') }}</label>
                <select class="form-control select2 {{ $errors->has('contact') ? 'is-invalid' : '' }}" name="contact_id" id="contact_id">
                    @foreach($contacts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('contact_id') ? old('contact_id') : $facture->contact->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.facture.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $facture->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_locked') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_locked" value="0">
                    <input class="form-check-input" type="checkbox" name="is_locked" id="is_locked" value="1" {{ $facture->is_locked || old('is_locked', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_locked">{{ trans('cruds.facture.fields.is_locked') }}</label>
                </div>
                @if($errors->has('is_locked'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_locked') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.is_locked_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.facture.fields.etape') }}</label>
                @foreach(App\Models\Facture::ETAPE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('etape') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="etape_{{ $key }}" name="etape" value="{{ $key }}" {{ old('etape', $facture->etape) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="etape_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('etape'))
                    <div class="invalid-feedback">
                        {{ $errors->first('etape') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.facture.fields.etape_helper') }}</span>
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