<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNumSerieRequest;
use App\Http\Requests\StoreNumSerieRequest;
use App\Http\Requests\UpdateNumSerieRequest;
use App\Models\Article;
use App\Models\NumSerie;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NumSerieController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('num_serie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = NumSerie::with(['article'])->select(sprintf('%s.*', (new NumSerie())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'num_serie_show';
                $editGate = 'num_serie_edit';
                $deleteGate = 'num_serie_delete';
                $crudRoutePart = 'num-series';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('note', function ($row) {
                return $row->note ? $row->note : '';
            });
            $table->editColumn('is_active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_active ? 'checked' : null) . '>';
            });
            $table->addColumn('article_name', function ($row) {
                return $row->article ? $row->article->name : '';
            });

            $table->editColumn('article.name', function ($row) {
                return $row->article ? (is_string($row->article) ? $row->article : $row->article->name) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'is_active', 'article']);

            return $table->make(true);
        }

        return view('admin.numSeries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('num_serie_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articles = Article::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.numSeries.create', compact('articles'));
    }

    public function store(StoreNumSerieRequest $request)
    {
        $numSerie = NumSerie::create($request->all());

        return redirect()->route('admin.num-series.index');
    }

    public function edit(NumSerie $numSerie)
    {
        abort_if(Gate::denies('num_serie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articles = Article::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $numSerie->load('article');

        return view('admin.numSeries.edit', compact('articles', 'numSerie'));
    }

    public function update(UpdateNumSerieRequest $request, NumSerie $numSerie)
    {
        $numSerie->update($request->all());

        return redirect()->route('admin.num-series.index');
    }

    public function show(NumSerie $numSerie)
    {
        abort_if(Gate::denies('num_serie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $numSerie->load('article');

        return view('admin.numSeries.show', compact('numSerie'));
    }

    public function destroy(NumSerie $numSerie)
    {
        abort_if(Gate::denies('num_serie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $numSerie->delete();

        return back();
    }

    public function massDestroy(MassDestroyNumSerieRequest $request)
    {
        NumSerie::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
