<?php

namespace App\Http\Requests\Role;

use App\Models\ManagementAccess\Role;
// use Gate;
use Illuminate\Foundation\Http\FormRequest;
use synfony\Component\HttpFoundation\Response;

class StoreRoleRequest extends FormRequest
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
            'title' => [
                'required','string','max:255','unique:role',
            ],
        ];
    }
}
