<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategorieRequest;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Models\Categorie;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CategorieController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('categorie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Categorie::query()->select(sprintf('%s.*', (new Categorie())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'categorie_show';
                $editGate = 'categorie_edit';
                $deleteGate = 'categorie_delete';
                $crudRoutePart = 'categories';

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
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('color', function ($row) {
                return $row->color ? $row->color : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.categories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('categorie_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categories.create');
    }

    public function store(StoreCategorieRequest $request)
    {
        $categorie = Categorie::create($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function edit(Categorie $category)
    {
        abort_if(Gate::denies('categorie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorie = $category;
        return view('admin.categories.edit', compact('categorie'));
    }

    public function edit2(Categorie $categorie)
    {
        abort_if(Gate::denies('categorie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        dd($categorie);
        $categorie = Categorie::findOrFail($categorie->id);
        return view('admin.categories.edit', compact('categorie'));
    }

    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {
        $categorie->update($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function show(Categorie $categorie)
    {
        abort_if(Gate::denies('categorie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorie->load('categorieArticles');

        return view('admin.categories.show', compact('categorie'));
    }

    public function destroy(Categorie $categorie)
    {
        abort_if(Gate::denies('categorie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorie->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategorieRequest $request)
    {
        Categorie::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
