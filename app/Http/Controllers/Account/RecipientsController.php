<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Recipients\GetRecipientsRequest;
use App\Http\Requests\Recipients\StoreRecipientRequest;
use App\Http\Requests\Recipients\UpdateRecipientRequest;
use App\Http\Resources\ListResource;
use App\Http\Resources\Recipients\RecipientsListResource;
use App\Recipient;
use App\Services\RecipientService;
use Illuminate\Http\JsonResponse;

/**
 * Class RecipientsController
 * @package App\Http\Controllers
 */
class RecipientsController extends Controller
{

    /**
     * Recipients service instance
     * @var RecipientService
     */
    protected $recipient_service;

    /**
     * RecipientsController constructor
     * @param RecipientService $recipient_service
     */
    public function __construct(RecipientService $recipient_service)
    {
        $this->recipient_service = $recipient_service;
    }

    /**
     * Get recipients
     *
     * @param GetRecipientsRequest $request
     * @return JsonResponse
     */
    public function index(GetRecipientsRequest $request) : JsonResponse
    {
        $result = $this->recipient_service->index($request->all());

        return new ListResource(
            $result['items'],
            RecipientsListResource::class,
            $result['count']
        );
    }

    /**
     * Store new recipient
     *
     * @param StoreRecipientRequest $request
     * @return array
     */
    public function store(StoreRecipientRequest $request)
    {
        $data = $request->all();
        $model = $this->recipient_service->store($data);

        return [
            'success' => (bool) $model
        ];
    }

    /**
     * Update recipient
     *
     * @param Recipient $recipient
     * @param UpdateRecipientRequest $request
     * @return array
     */
    public function update(Recipient $recipient, UpdateRecipientRequest $request)
    {
        $data = $request->all();
        $model = $this->recipient_service->update($recipient, $data);

        return [
            'success' => (bool) $model
        ];
    }

    /**
     * Delete recipient
     *
     * @param Recipient $recipient
     * @return array
     * @throws \Exception
     */
    public function delete(Recipient $recipient)
    {
        return [
            'success' => $this->recipient_service->delete($recipient)
        ];
    }

}
