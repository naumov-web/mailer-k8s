<?php

namespace App\Http\Controllers\Account;

use App\Enums\QueueNamesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Letters\StoreLetterRequest;
use App\Http\Requests\Letters\GetLettersRequest;
use App\Http\Requests\Letters\UpdateLetterRequest;
use App\Http\Resources\Letters\LettersListResource;
use App\Http\Resources\ListResource;
use App\Jobs\Mail\SendEmail;
use App\Letter;
use App\Mail\SimpleMail;
use App\Services\LetterService;
use Illuminate\Http\JsonResponse;

/**
 * Class LettersController
 * @package App\Http\Controllers\Account
 */
class LettersController extends Controller
{

    /**
     * Letter service instance
     * @var LetterService
     */
    protected $letter_service;

    /**
     * LettersController constructor
     * @param LetterService $letter_service
     */
    public function __construct(LetterService $letter_service)
    {
        $this->letter_service = $letter_service;
    }

    /**
     * Get recipients
     *
     * @param GetLettersRequest $request
     * @return JsonResponse
     */
    public function index(GetLettersRequest $request) : JsonResponse
    {
        $result = $this->letter_service->index($request->all());

        return new ListResource(
            $result['items'],
            LettersListResource::class,
            $result['count']
        );
    }

    /**
     * Store new letter
     *
     * @param StoreLetterRequest $request
     * @return array
     */
    public function store(StoreLetterRequest $request) : array
    {
        $data = $request->all();
        $model = $this->letter_service->store($data);

        return [
            'success' => (bool) $model
        ];
    }

    /**
     * Update letter
     *
     * @param Letter $letter
     * @param UpdateLetterRequest $request
     * @return array
     */
    public function update(Letter $letter, UpdateLetterRequest $request) : array
    {
        $data = $request->all();
        $model = $this->letter_service->update($letter, $data);

        return [
            'success' => (bool) $model
        ];
    }

    /**
     * Delete letter
     *
     * @param Letter $letter
     * @return array
     * @throws \Exception
     */
    public function delete(Letter $letter) : array
    {
        return [
            'success' => $this->letter_service->delete($letter)
        ];
    }

    /**
     * Add letter to sending queue
     *
     * @param Letter $letter
     * @return array
     */
    public function send(Letter $letter) : array
    {
        dispatch(new SendEmail(new SimpleMail($letter)))->onQueue(QueueNamesEnum::EMAIL);

        return [
            'success' => true
        ];
    }

}
