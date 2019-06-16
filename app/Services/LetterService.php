<?php

namespace App\Services;

use App\Letter;
use App\Traits\ApplyPagination;
use App\Traits\ApplySimpleSorting;

/**
 * Class LetterService
 * @package App\Services
 */
class LetterService
{

    use ApplyPagination, ApplySimpleSorting;

    /**
     * Get letters
     *
     * @param array $data
     * @return array
     */
    public function index(array $data) : array
    {
        $query = Letter::query();

        $count = $query->count();

        $query = $this->applyPagination($query, $data);
        $query = $this->applySimpleSorting($query, $data);

        return [
            'count' => $count,
            'items' => $query->get(),
        ];
    }

    /**
     * Store letter
     *
     * @param array $data
     * @return Letter
     */
    public function store(array $data) : Letter
    {
        $model = new Letter();
        $model->fill($data);
        $model->save();

        $recipient_ids = $data['recipient_ids'] ?? [];
        $model->recipients()->sync($recipient_ids);

        return $model;
    }

    /**
     * Update letter
     *
     * @param Letter $model
     * @param array $data
     * @return Letter
     */
    public function update(Letter $model, array $data) : Letter
    {
        $model->fill($data);
        $model->save();

        $recipient_ids = $data['recipient_ids'] ?? [];
        $model->recipients()->sync($recipient_ids);

        return $model;
    }

    /**
     * Delete letter
     *
     * @param Letter $model
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Letter $model)
    {
        return $model->delete();
    }

}
