<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_create');
    }

    public function rules()
    {
        return [
            'reference' => [
                'string',
                'nullable',
            ],
            'raison_sociale' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'telephone_1' => [
                'string',
                'nullable',
            ],
            'telephone_2' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
        ];
    }
}
