<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required | min:5 | max:60 ',
            'content' => 'required | min:3 | max:255',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'There\'s an empty field',
            'title.min' => 'Insert at least :min characters',
            'title.max' => 'Max characters admissed :max',
            'content.required' => 'There\'s an empty field',
            'content.max' => 'Massimo characters admissed :max',
            'content.min' => 'Insert at least :min characters',
        ];
    }
}
