<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use synfony\Component\HttpFoundation\Response;

// this rule only at update requests
use Illuminate\Validation\Rule;

class UpdateUSerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       // create middleware from kernel php
       abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'required','email','max:255', Rule::unique('users')->ignore($this->user),
                // rule unique only works for other records id
            ],
            'password' => [
               'min:8','string','max:255','MixedCase',
            ],
            // add validation for role this here
        ];
    }
}
