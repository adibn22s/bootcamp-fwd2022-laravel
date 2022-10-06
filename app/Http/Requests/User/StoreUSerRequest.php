<?php

namespace App\Http\Requests\User;

use App\Models\User;
// use Gate;
use Illuminate\Foundation\Http\FormRequest;
use synfony\Component\HttpFoundation\Response;

// this rule only at update requests
use Illuminate\Validation\Rule;

class StoreUSerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // create middleware from kernel php
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
            'name' => [
                'required','string','max:255',
            ],
            'email' => [
                'required','email','unique:users','max:255',
            ],
            'password' => [
               'min:8','string','max:255','MixedCase',
            ],
            // add validation for role this here
        ];
    }
}
