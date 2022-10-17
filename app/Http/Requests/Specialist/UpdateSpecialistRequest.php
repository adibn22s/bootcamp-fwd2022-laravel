<?php

namespace App\Http\Requests\Specialist;

use App\Models\MasterData\Specialist;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use synfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Rule;

class UpdateSpecialistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('specialist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return false;
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
                'required','string','max:255',Rule::unique('specialist')->ignore($this->specialist),
            ],
            'price' => [
                'required','string','max:255',
            ],
        ];
    }
}
