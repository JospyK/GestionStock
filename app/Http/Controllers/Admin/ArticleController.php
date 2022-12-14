<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Categorie;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('article_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Article::with(['categories'])->select(sprintf('%s.*', (new Article())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'article_show';
                $editGate = 'article_edit';
                $deleteGate = 'article_delete';
                $crudRoutePart = 'articles';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('reference', function ($row) {
                return $row->reference ? $row->reference : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('prix_min', function ($row) {
                return $row->prix_min ? $row->prix_min : '';
            });
            $table->editColumn('prix_ht', function ($row) {
                return $row->prix_ht ? $row->prix_ht : '';
            });
            $table->editColumn('stock_actuel', function ($row) {
                return $row->stock_actuel ? $row->stock_actuel : '';
            });
            $table->editColumn('categorie', function ($row) {
                $labels = [];
                foreach ($row->categories as $categorie) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $categorie->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'categorie']);

            return $table->make(true);
        }

        return view('admin.articles.index');
    }

    public function create()
    {
        abort_if(Gate::denies('article_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Categorie::pluck('name', 'id');

        return view('admin.articles.create', compact('categories'));
    }

    public function store(StoreArticleRequest $request)
    {
        $article = Article::create($request->all());
        $article->categories()->sync($request->input('categories', []));
        foreach ($request->input('photo', []) as $file) {
            $article->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $article->id]);
        }

        return redirect()->route('admin.articles.index');
    }

    public function edit(Article $article)
    {
        abort_if(Gate::denies('article_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Categorie::pluck('name', 'id');

        $article->load('categories');

        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        $article->categories()->sync($request->input('categories', []));
        if (count($article->photo) > 0) {
            foreach ($article->photo as $media) {
                if (!in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $article->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $article->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return redirect()->route('admin.articles.index');
    }

    public function show(Article $article)
    {
        abort_if(Gate::denies('article_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $article->load('categories', 'articleNumSeries');

        return view('admin.articles.show', compact('article'));
    }

    public function destroy(Article $article)
    {
        abort_if(Gate::denies('article_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $article->delete();

        return back();
    }

    public function massDestroy(MassDestroyArticleRequest $request)
    {
        Article::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('article_create') && Gate::denies('article_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Article();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
