<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize():bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules():array
    {
        return [
            'title' => 'required | max:30',
            'content' =>'required'
        ];
    }
    
    public function message()
    {
        return [
            'title.required' => 'A Title is empty!!!',
            'title.max' =>'A Title is max 30',
            'content.required' => 'Content is empty!!'
        ];
    }
}