<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Entity extends FormRequest
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

//    public function all($keys = null)
//    {
//        return $this->validateFields(parent::all());
//    }
//
//    public function validateFields(array $inputs)
//    {
//        $inputs['document_entity'] = str_replace(['.', '-'], '', $this->request->all()['document_entity']);
//        return $inputs;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'social_name' => 'required',
            'document_entity' => (!empty($this->request->all()['id']) ? 'required|min:11|max:18|unique:entities,document_entity,' . $this->request->all()['id'] : 'required|min:14|max:18|unique:entities,document_entity'),
            'document_entity_secondary' => 'required',
            'telephone' => 'required',

            //Address
            'zipcode' => 'required|min:8|max:9',
            'street' => 'required',
            'number' => 'required',
            'complement' => 'required',
            'neighborhood' => 'required',
            'state' => 'required',
            'city' => 'required',
        ];
    }
}
