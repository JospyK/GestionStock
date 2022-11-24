<?php

namespace App\Http\Requests;

use App\Models\Facture;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFactureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('facture_create');
    }

    public function rules()
    {
        return [
            'reference' => [
                'string',
                'nullable',
            ],
            'date_facture' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'date_reglement' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
