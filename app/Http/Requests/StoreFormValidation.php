<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormValidation extends FormRequest
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
        /*return [
            'title' => 'required|unique:todos',
            'body' => 'required'
        ];*/

        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'title' => 'required|unique:todos|max:50',
                    'body' => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'required|max:50',
                    'body' => 'required',
                ];
            }            
            default:               
                break;
        }
    }
}
