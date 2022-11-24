<?php

namespace App\Http\Requests;

use App\Models\FactureDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFactureDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('facture_detail_create');
    }

    public function rules()
    {
        return [
            'num_serie' => [
                'string',
                'nullable',
            ],
            'tva' => [
                'numeric',
            ],
            'qte' => [
                'numeric',
            ],
        ];
    }
}
