@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.contact.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contacts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="reference">{{ trans('cruds.contact.fields.reference') }}</label>
                <input class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{ old('reference', '') }}">
                @if($errors->has('reference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.reference_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.contact.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="raison_sociale">{{ trans('cruds.contact.fields.raison_sociale') }}</label>
                <input class="form-control {{ $errors->has('raison_sociale') ? 'is-invalid' : '' }}" type="text" name="raison_sociale" id="raison_sociale" value="{{ old('raison_sociale', '') }}">
                @if($errors->has('raison_sociale'))
                    <div class="invalid-feedback">
                        {{ $errors->first('raison_sociale') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.raison_sociale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telephone_1">{{ trans('cruds.contact.fields.telephone_1') }}</label>
                <input class="form-control {{ $errors->has('telephone_1') ? 'is-invalid' : '' }}" type="text" name="telephone_1" id="telephone_1" value="{{ old('telephone_1', '') }}">
                @if($errors->has('telephone_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telephone_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.telephone_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telephone_2">{{ trans('cruds.contact.fields.telephone_2') }}</label>
                <input class="form-control {{ $errors->has('telephone_2') ? 'is-invalid' : '' }}" type="text" name="telephone_2" id="telephone_2" value="{{ old('telephone_2', '') }}">
                @if($errors->has('telephone_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telephone_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.telephone_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.contact.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adresse">{{ trans('cruds.contact.fields.adresse') }}</label>
                <textarea class="form-control {{ $errors->has('adresse') ? 'is-invalid' : '' }}" name="adresse" id="adresse">{{ old('adresse') }}</textarea>
                @if($errors->has('adresse'))
                    <div class="invalid-feedback">
                        {{ $errors->first('adresse') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.adresse_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('client') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="client" value="0">
                    <input class="form-check-input" type="checkbox" name="client" id="client" value="1" {{ old('client', 0) == 1 || old('client') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="client">{{ trans('cruds.contact.fields.client') }}</label>
                </div>
                @if($errors->has('client'))
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('fournisseur') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="fournisseur" value="0">
                    <input class="form-check-input" type="checkbox" name="fournisseur" id="fournisseur" value="1" {{ old('fournisseur', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="fournisseur">{{ trans('cruds.contact.fields.fournisseur') }}</label>
                </div>
                @if($errors->has('fournisseur'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fournisseur') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.fournisseur_helper') }}</span>
            </div>
            <div class="form-group">
                <input type="hidden" name="created_by_id" id="created_by_id" value="{{auth()->id()}}">
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
