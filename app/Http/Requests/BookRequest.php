<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string',
            'author' => 'required|string',
            'genre' => 'required|string',
            'description'=>'required|string',
            'published' => 'required|date',
            'publisher'=> 'required|string',
            'isbn' =>'required|string',
        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'isbn.required'=> 'The ISBN Number  is required.',
            'published.date'=>'The published date is required.'
        ];
    }
}
