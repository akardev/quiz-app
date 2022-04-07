<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class QuizUpdateRequest extends FormRequest
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
            'title' => 'required|min:3|max:200',
           'description' => 'max:1000',
           'finished_at' => 'nullable|after:'.now(),
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug'           => Str::slug($this->title)
        ]);
    }

}
