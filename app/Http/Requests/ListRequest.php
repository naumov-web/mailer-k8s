<?php

namespace App\Http\Requests;

/**
 * Class ListRequest
 *
 * @package App\Http\Requests
 */
class ListRequest extends BaseApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'limit' => 'required|integer',
            'offset' => 'required|integer',
            'sort_by' => 'string',
            'sort_direction' => 'string|in:asc,desc',
        ];
    }
}
