<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait ApplyPagination
 *
 * @package App\Traits
 */
trait ApplyPagination
{

    /**
     * Apply pagination params to query builder
     *
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function applyPagination(Builder $query, array $params) : Builder
    {
        $query->when($params['limit'] ?? null, function ($query, $limit) {
            $query->limit($limit);
        });
        $query->when($params['offset'] ?? null, function ($query, $offset) {
            $query->offset($offset);
        });

        return $query;
    }

}
