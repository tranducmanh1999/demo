<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRolesRequest extends FormRequest
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
            'name' => 'required || max:10',
            'slug' => 'required || max:10'
        ];
    }
    
    public function message()
    {
        return [
            'name.required' => 'Role name is empty!!',
            'name.max' => 'Role name max is 10',
            'slug.required' => 'Slug is empty!!',
            'slug.max' => 'Slug max is 10'
        ];
    }
}