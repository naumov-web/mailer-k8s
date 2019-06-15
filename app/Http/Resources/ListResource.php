<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

/**
 * Class ListResource
 *
 * @package App\Http\Resources
 */
class ListResource extends JsonResponse
{
    /**
     * ListResource constructor.
     *
     * @param Collection $items
     * @param int $count
     * @param string $collection_instance
     */
    public function __construct(Collection $items, string $collection_instance, int $count)
    {
        parent::__construct([
            'items' => $collection_instance::collection($items),
            'count' => $count,
        ]);
    }
}
