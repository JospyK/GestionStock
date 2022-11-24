<?php

namespace App\Http\Requests;

use App\Models\Approvisionnement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreApprovisionnementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('approvisionnement_create');
    }

    public function rules()
    {
        return [
            'qte' => [
                'numeric',
            ],
        ];
    }
}
