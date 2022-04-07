<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class QuestionUpdate extends FormRequest
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
            'questions' => 'required|min:3',
            'answer1' => 'required|min:1',
            'answer2' => 'required|min:1',
            'answer3' => 'required|min:1',
            'answer4' => 'required|min:1',
            'image' => 'image|nullable|max:1024|mimes:jpg,jpeg,png',
            'correct_answer'=> 'required'
        ];
    }


    
}
