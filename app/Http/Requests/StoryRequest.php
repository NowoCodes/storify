<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoryRequest extends FormRequest
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
        /**
         * ? Get story Id to ignore unique titles when updating
         */
        $storyID = $this->route('story.id');
        return [
            'title' => [
                'required', 'min:10', 'max:50',
                function ($attribue, $value, $fail) {
                    if ($value == 'Dummy Title') {
                        $fail($attribue . ' is not valid');
                    }
                },
                Rule::unique('stories')->ignore($storyID)
            ],
            'body' => 'required|min:50',
            'type' => 'required',
            'status' => 'required',
        ];
    }

    public function withValidator($v)
    {
        $v->sometimes(
            'body',
            'max:200',
            function ($input) {
                return 'short' == $input->type;
            }
        );
    }

    public function messages()
    {
        return [
            'title.required' => 'You must enter :attribute',
            'required' => 'Please enter :attribute',
        ];
    }
}
