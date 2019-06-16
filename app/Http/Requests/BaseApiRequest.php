<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Class BaseApiRequest
 * @package App\Http\Requests
 */
class BaseApiRequest extends FormRequest
{
    /**
     * Validation failed handler
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $response = [
            'errors' => $validator->errors(),
        ];

        throw new HttpResponseException(response()->json($response, 422));
    }
}
