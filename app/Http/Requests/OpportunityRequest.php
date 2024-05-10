<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpportunityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'prospect_name' => 'required|string',
                    'prospect_email' => 'required|email|unique:opportunities',
                    'title' => 'required|string',
                    'prospect_phone' => 'string'
                ];
            case 'PATCH':
                return [
                    'prospect_name' => 'required|string',
                    'prospect_email' => 'required|email',
                    'title' => 'required|string',
                    'prospect_phone' => 'string'
                ];
            case 'DEFAULT':
                return [];
        }
    }
}
