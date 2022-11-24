<?php

namespace App\Http\Requests;

use App\Models\Approvisionnement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateApprovisionnementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('approvisionnement_edit');
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
