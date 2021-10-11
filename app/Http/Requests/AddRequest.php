<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
        return [
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'price'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => "É richiesto un titolo dell'annuncio",
            'description.required' => "É richiesta una descrizione dell'annuncio",
            'category.required' => "É richiesta una categoria dell'annuncio",
            'price.required' => "É richiesto di specificare il prezzo dell'annuncio"
        ];
    }
}
