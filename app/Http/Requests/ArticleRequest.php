<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|unique:articles',
            'body' => 'required|min:400',
        ];
        if ($this->route()->named('articles.update')) {
            $rules['name'] = [
                'required',
                Rule::unique('articles', 'name')->ignore($this->id),
            ];
        }
        return $rules;
    }
}
