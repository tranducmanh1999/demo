<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'  => 'required | max:30',
            'content'=> 'required'
        ];
    }

    public function message()
    {
        return [
            'title.required' => 'Title is empty!!',
            'title.max' => 'Title is max 30',
            'content' => 'Content is empty!!'
        ];
    }
}