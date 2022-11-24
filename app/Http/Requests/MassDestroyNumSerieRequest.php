<?php

namespace App\Http\Requests;

use App\Models\NumSerie;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNumSerieRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('num_serie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:num_series,id',
        ];
    }
}
