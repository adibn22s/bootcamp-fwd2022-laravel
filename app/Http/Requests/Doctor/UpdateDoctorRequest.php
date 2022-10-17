<?php

namespace App\Http\Requests\Doctor;

use App\Models\Operational\Doctor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use synfony\Component\HttpFoundation\Response;

class UpdateDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('doctor_edit'),Response::HTTP_FORBIDDEN,'403 Forbidden');

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
            'specialist_id' => [
                'required','integer',
            ],
            'name' => [
                'required','string','max:255',
            ],
            'fee' => [
                'required','string','max:255',
            ],
            'photo' => [
                'nullable','string','max:10000',
            ],
            // add validation for role this here
        ];
    }
}
