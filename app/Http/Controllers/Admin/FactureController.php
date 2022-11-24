<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFactureRequest;
use App\Http\Requests\StoreFactureRequest;
use App\Http\Requests\UpdateFactureRequest;
use App\Models\Contact;
use App\Models\Facture;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FactureController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('facture_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Facture::with(['contact', 'user'])->select(sprintf('%s.*', (new Facture())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'facture_show';
                $editGate = 'facture_edit';
                $deleteGate = 'facture_delete';
                $crudRoutePart = 'factures';

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

            $table->editColumn('total_ht', function ($row) {
                return $row->total_ht ? $row->total_ht : '';
            });
            $table->addColumn('contact_name', function ($row) {
                return $row->contact ? $row->contact->name : '';
            });

            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('etape', function ($row) {
                return $row->etape ? Facture::ETAPE_RADIO[$row->etape] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'contact', 'user']);

            return $table->make(true);
        }

        return view('admin.factures.index');
    }

    public function create()
    {
        abort_if(Gate::denies('facture_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contacts = Contact::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.factures.create', compact('contacts', 'users'));
    }

    public function store(StoreFactureRequest $request)
    {
        $facture = Facture::create($request->all());

        return redirect()->route('admin.factures.index');
    }

    public function edit(Facture $facture)
    {
        abort_if(Gate::denies('facture_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contacts = Contact::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $facture->load('contact', 'user');

        return view('admin.factures.edit', compact('contacts', 'facture', 'users'));
    }

    public function update(UpdateFactureRequest $request, Facture $facture)
    {
        $facture->update($request->all());

        return redirect()->route('admin.factures.index');
    }

    public function show(Facture $facture)
    {
        abort_if(Gate::denies('facture_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facture->load('contact', 'user');

        return view('admin.factures.show', compact('facture'));
    }

    public function destroy(Facture $facture)
    {
        abort_if(Gate::denies('facture_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facture->delete();

        return back();
    }

    public function massDestroy(MassDestroyFactureRequest $request)
    {
        Facture::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
