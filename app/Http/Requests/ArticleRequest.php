<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        return false;
        return true; // Enable anyone to edit or create article as an authentication system is not set
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date'
        ];

        /*

        // We could ues the following structure to set different validation to separate actions
        // the common rules
        $rules = [
            'title' => 'required|min:3',
            'body' => 'required',
            'published_at' => 'required|date'
        ];

        // $condition according to the URL segment or other...
        if($condition) {
            $rules['something_else'] = 'rules'; //set new rules or modify common rules
        }

        return $rules;

        */
    }
}
