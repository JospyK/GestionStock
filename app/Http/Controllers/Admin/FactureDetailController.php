<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFactureDetailRequest;
use App\Http\Requests\StoreFactureDetailRequest;
use App\Http\Requests\UpdateFactureDetailRequest;
use App\Models\Article;
use App\Models\Facture;
use App\Models\FactureDetail;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FactureDetailController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('facture_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = FactureDetail::with(['article', 'user', 'facture'])->select(sprintf('%s.*', (new FactureDetail())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'facture_detail_show';
                $editGate = 'facture_detail_edit';
                $deleteGate = 'facture_detail_delete';
                $crudRoutePart = 'facture-details';

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
            $table->addColumn('article_reference', function ($row) {
                return $row->article ? $row->article->reference : '';
            });

            $table->editColumn('num_serie', function ($row) {
                return $row->num_serie ? $row->num_serie : '';
            });
            $table->editColumn('tva', function ($row) {
                return $row->tva ? $row->tva : '';
            });
            $table->editColumn('qte', function ($row) {
                return $row->qte ? $row->qte : '';
            });
            $table->editColumn('total_ht', function ($row) {
                return $row->total_ht ? $row->total_ht : '';
            });
            $table->editColumn('total_ttc', function ($row) {
                return $row->total_ttc ? $row->total_ttc : '';
            });
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->addColumn('facture_reference', function ($row) {
                return $row->facture ? $row->facture->reference : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'article', 'user', 'facture']);

            return $table->make(true);
        }

        return view('admin.factureDetails.index');
    }

    public function create()
    {
        abort_if(Gate::denies('facture_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articles = Article::pluck('reference', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $factures = Facture::pluck('reference', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.factureDetails.create', compact('articles', 'factures', 'users'));
    }

    public function store(StoreFactureDetailRequest $request)
    {
        $factureDetail = FactureDetail::create($request->all());

        return redirect()->route('admin.facture-details.index');
    }

    public function edit(FactureDetail $factureDetail)
    {
        abort_if(Gate::denies('facture_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $articles = Article::pluck('reference', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $factures = Facture::pluck('reference', 'id')->prepend(trans('global.pleaseSelect'), '');

        $factureDetail->load('article', 'user', 'facture');

        return view('admin.factureDetails.edit', compact('articles', 'factureDetail', 'factures', 'users'));
    }

    public function update(UpdateFactureDetailRequest $request, FactureDetail $factureDetail)
    {
        $factureDetail->update($request->all());

        return redirect()->route('admin.facture-details.index');
    }

    public function show(FactureDetail $factureDetail)
    {
        abort_if(Gate::denies('facture_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $factureDetail->load('article', 'user', 'facture');

        return view('admin.factureDetails.show', compact('factureDetail'));
    }

    public function destroy(FactureDetail $factureDetail)
    {
        abort_if(Gate::denies('facture_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $factureDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyFactureDetailRequest $request)
    {
        FactureDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
