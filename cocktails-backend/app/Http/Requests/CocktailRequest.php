<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CocktailRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'image_url' => 'required|url',
            'description' => 'required|string|max:1000',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
