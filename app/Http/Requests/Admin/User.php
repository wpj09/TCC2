<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class User extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:191',
            'genre' => 'required|in:male,female,other',
            'document' => (!empty($this->request->all()['id']) ? 'required|min:11|max:11|unique:users,document,' . $this->request->all()['id'] : 'required|min:11|max:11|unique:users,document'),
            'document_secondary' => 'required|min:07|max:20',
            'document_secondary_complement' => 'required',
            'date_of_birth' => 'required|date_format:d/m/Y',
            'place_of_birth' => 'required',
            'civil_status' => 'required|in:married,separated,single,divorced,widower',

            //Address
            'zipcode' => 'required|min:8|max:9',
            'street' => 'required',
            'number' => 'required',
            'complement' => 'required',
            'neighborhood' => 'required',
            'state' => 'required',
            'city' => 'required',

            // Contact
            'cell' => 'required',

            // Access
            'email' => (!empty($this->request->all()['id']) ? 'required|email|unique:users,email,' . $this->request->all()['id'] : 'required|email|unique:users,email'),
        ];
    }
}
