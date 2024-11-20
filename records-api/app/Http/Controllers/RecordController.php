<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RecordSearchRequest;
use App\Http\Requests\RecordShowRequest;
use App\Services\RecordService;
use Illuminate\Http\JsonResponse;

class RecordController extends Controller
{
    protected RecordService $recordService;

    public function __construct(RecordService $recordService)
    {
        $this->recordService = $recordService;
    }

    /**
     * Метод для поиска записей по ключам и значениям.
     *
     * @param RecordSearchRequest $request
     * @return JsonResponse
     */
    public function search(RecordSearchRequest $request): JsonResponse
    {
        $filters = $request->input('filters');

        $records = $this->recordService->searchRecords($filters);

        return response()->json([
            'data' => $records,
        ]);
    }

    /**
     * Получение записи по идентификатору.
     *
     * @param RecordShowRequest $request
     * @return JsonResponse
     */
    public function show(RecordShowRequest $request): JsonResponse
    {
        // Получаем запись по ID
        $recordDTO = $this->recordService->getRecordById($request->validated('id'));

        return response()->json(['data' => $recordDTO]);
    }
}
