<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyApprovisionnementRequest;
use App\Http\Requests\StoreApprovisionnementRequest;
use App\Http\Requests\UpdateApprovisionnementRequest;
use App\Models\Approvisionnement;
use App\Models\Article;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ApprovisionnementController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('approvisionnement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Approvisionnement::with(['article', 'user'])->select(sprintf('%s.*', (new Approvisionnement())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'approvisionnement_show';
                $editGate = 'approvisionnement_edit';
                $deleteGate = 'approvisionnement_delete';
                $crudRoutePart = 'approvisionnements';

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
            $table->addColumn('article_name', function ($row) {
                return $row->article ? $row->article->name : '';
            });

            $table->editColumn('qte', function ($row) {
                return $row->qte ? $row->qte : '';
            });
            $table->editColumn('total_ht', function ($row) {
                return $row->total_ht ? $row->total_ht : '';
            });
            $table->editColumn('etape', function ($row) {
                return $row->etape ? Approvisionnement::ETAPE_RADIO[$row->etape] : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'article', 'user']);

            return $table->make(true);
        }

        return view('admin.approvisionnements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('approvisionnement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articles = Article::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.approvisionnements.create', compact('articles', 'users'));
    }

    public function store(StoreApprovisionnementRequest $request)
    {
        $approvisionnement = Approvisionnement::create($request->all());

        return redirect()->route('admin.approvisionnements.index');
    }

    public function edit(Approvisionnement $approvisionnement)
    {
        abort_if(Gate::denies('approvisionnement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articles = Article::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approvisionnement->load('article', 'user');

        return view('admin.approvisionnements.edit', compact('approvisionnement', 'articles', 'users'));
    }

    public function update(UpdateApprovisionnementRequest $request, Approvisionnement $approvisionnement)
    {
        $approvisionnement->update($request->all());

        return redirect()->route('admin.approvisionnements.index');
    }

    public function show(Approvisionnement $approvisionnement)
    {
        abort_if(Gate::denies('approvisionnement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approvisionnement->load('article', 'user');

        return view('admin.approvisionnements.show', compact('approvisionnement'));
    }

    public function destroy(Approvisionnement $approvisionnement)
    {
        abort_if(Gate::denies('approvisionnement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $approvisionnement->delete();

        return back();
    }

    public function massDestroy(MassDestroyApprovisionnementRequest $request)
    {
        Approvisionnement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
