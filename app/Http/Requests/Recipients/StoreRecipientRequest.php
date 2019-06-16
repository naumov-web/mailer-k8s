<?php

namespace App\Http\Requests\Recipients;

use App\Http\Requests\BaseApiRequest;

/**
 * Class StoreRecipientRequest
 * @package App\Http\Requests\Recipients
 */
class StoreRecipientRequest extends BaseApiRequest
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
            'email' => 'required|email',
            'name' => 'nullable|string',
            'surname' => 'nullable|string',
        ];
    }
}
