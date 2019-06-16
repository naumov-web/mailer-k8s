<?php

namespace App\Http\Requests\Letters;

use App\Http\Requests\BaseApiRequest;

/**
 * Class StoreLetterRequest
 * @package App\Http\Requests\Recipients
 */
class StoreLetterRequest extends BaseApiRequest
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
            'subject' => 'required|string',
            'content' => 'required|string',
            'recipient_ids' => 'required|array'
        ];
    }
}
