<?php

namespace App\Http\Requests;

use App\Models\Article;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreArticleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('article_create');
    }

    public function rules()
    {
        return [
            'reference' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'tva' => [
                'numeric',
            ],
            'stock_actuel' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'stock_seuil' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'stock_virtuel' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'stock_physique' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories' => [
                'array',
            ],
            'photo' => [
                'array',
            ],
        ];
    }
}
