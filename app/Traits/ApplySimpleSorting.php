<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait ApplySimpleSorting
 *
 * @package App\Traits
 */
trait ApplySimpleSorting
{

    /**
     * Apply sorting to query builder
     *
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function applySimpleSorting(Builder $query, array $params) : Builder
    {
        if (($params['sort_by'] ?? null) &&
            ($params['sort_direction'] ?? null)
        ) {
            $query->orderBy($params['sort_by'], $params['sort_direction']);
        }

        return $query;
    }

}
