@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.article.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.articles.update", [$article->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="reference">{{ trans('cruds.article.fields.reference') }}</label>
                <input class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" type="text" name="reference" id="reference" value="{{ old('reference', $article->reference) }}">
                @if($errors->has('reference'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.reference_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.article.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $article->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prix_min">{{ trans('cruds.article.fields.prix_min') }}</label>
                <input class="form-control {{ $errors->has('prix_min') ? 'is-invalid' : '' }}" type="number" name="prix_min" id="prix_min" value="{{ old('prix_min', $article->prix_min) }}" step="0.01">
                @if($errors->has('prix_min'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prix_min') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.prix_min_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prix_ht">{{ trans('cruds.article.fields.prix_ht') }}</label>
                <input class="form-control {{ $errors->has('prix_ht') ? 'is-invalid' : '' }}" type="number" name="prix_ht" id="prix_ht" value="{{ old('prix_ht', $article->prix_ht) }}" step="0.01">
                @if($errors->has('prix_ht'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prix_ht') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.prix_ht_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="prix_ttc">{{ trans('cruds.article.fields.prix_ttc') }}</label>
                <input class="form-control {{ $errors->has('prix_ttc') ? 'is-invalid' : '' }}" type="number" name="prix_ttc" id="prix_ttc" value="{{ old('prix_ttc', $article->prix_ttc) }}" step="0.01">
                @if($errors->has('prix_ttc'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prix_ttc') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.prix_ttc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tva">{{ trans('cruds.article.fields.tva') }}</label>
                <input class="form-control {{ $errors->has('tva') ? 'is-invalid' : '' }}" type="number" name="tva" id="tva" value="{{ old('tva', $article->tva) }}" step="0.01">
                @if($errors->has('tva'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tva') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.tva_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stock_actuel">{{ trans('cruds.article.fields.stock_actuel') }}</label>
                <input class="form-control {{ $errors->has('stock_actuel') ? 'is-invalid' : '' }}" type="number" name="stock_actuel" id="stock_actuel" value="{{ old('stock_actuel', $article->stock_actuel) }}" step="1">
                @if($errors->has('stock_actuel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stock_actuel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.stock_actuel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stock_seuil">{{ trans('cruds.article.fields.stock_seuil') }}</label>
                <input class="form-control {{ $errors->has('stock_seuil') ? 'is-invalid' : '' }}" type="number" name="stock_seuil" id="stock_seuil" value="{{ old('stock_seuil', $article->stock_seuil) }}" step="1">
                @if($errors->has('stock_seuil'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stock_seuil') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.stock_seuil_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stock_virtuel">{{ trans('cruds.article.fields.stock_virtuel') }}</label>
                <input class="form-control {{ $errors->has('stock_virtuel') ? 'is-invalid' : '' }}" type="number" name="stock_virtuel" id="stock_virtuel" value="{{ old('stock_virtuel', $article->stock_virtuel) }}" step="1">
                @if($errors->has('stock_virtuel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stock_virtuel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.stock_virtuel_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stock_physique">{{ trans('cruds.article.fields.stock_physique') }}</label>
                <input class="form-control {{ $errors->has('stock_physique') ? 'is-invalid' : '' }}" type="number" name="stock_physique" id="stock_physique" value="{{ old('stock_physique', $article->stock_physique) }}" step="1">
                @if($errors->has('stock_physique'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stock_physique') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.stock_physique_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.article.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $article->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.article.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note', $article->note) }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('tosell') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="tosell" value="0">
                    <input class="form-check-input" type="checkbox" name="tosell" id="tosell" value="1" {{ $article->tosell || old('tosell', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="tosell">{{ trans('cruds.article.fields.tosell') }}</label>
                </div>
                @if($errors->has('tosell'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tosell') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.tosell_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('tobuy') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="tobuy" value="0">
                    <input class="form-check-input" type="checkbox" name="tobuy" id="tobuy" value="1" {{ $article->tobuy || old('tobuy', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="tobuy">{{ trans('cruds.article.fields.tobuy') }}</label>
                </div>
                @if($errors->has('tobuy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tobuy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.tobuy_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="categories">{{ trans('cruds.article.fields.categorie') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $article->categories->contains($id)) ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <div class="invalid-feedback">
                        {{ $errors->first('categories') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.categorie_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_active" value="0">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $article->is_active || old('is_active', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">{{ trans('cruds.article.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_active') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.is_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.article.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.article.fields.photo_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.articles.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $article->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.articles.storeMedia') }}',
    maxFilesize: 3, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 3,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($article) && $article->photo)
      var files = {!! json_encode($article->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection