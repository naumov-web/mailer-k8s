<?php

namespace App\Services;

use App\Recipient;
use App\Traits\ApplyPagination;
use App\Traits\ApplySimpleSorting;

/**
 * Class RecipientService
 * @package App\Services
 */
class RecipientService
{

    use ApplyPagination, ApplySimpleSorting;

    /**
     * Get recipients
     *
     * @param array $data
     * @return array
     */
    public function index(array $data) : array
    {
        $query = Recipient::query();

        $count = $query->count();

        $query = $this->applyPagination($query, $data);
        $query = $this->applySimpleSorting($query, $data);

        return [
            'count' => $count,
            'items' => $query->get(),
        ];
    }

    /**
     * Store recipient
     *
     * @param array $data
     * @return Recipient
     */
    public function store(array $data) : Recipient
    {
        $model = new Recipient();
        $model->fill($data);
        $model->save();

        return $model;
    }

    /**
     * Update recipient
     *
     * @param Recipient $model
     * @param array $data
     * @return Recipient
     */
    public function update(Recipient $model, array $data) : Recipient
    {
        $model->fill($data);
        $model->save();

        return $model;
    }

    /**
     * Delete recipient
     *
     * @param Recipient $model
     * @return bool
     * @throws \Exception
     */
    public function delete(Recipient $model) : bool
    {
        return $model->delete();
    }

}
