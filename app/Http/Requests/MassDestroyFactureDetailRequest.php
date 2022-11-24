<?php

namespace App\Http\Requests;

use App\Models\FactureDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFactureDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('facture_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:facture_details,id',
        ];
    }
}
