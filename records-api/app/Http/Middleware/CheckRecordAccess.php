<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Record;

class CheckRecordAccess
{
    /**
     * Обработка входящего запроса.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $recordId = $request->route('id');

        $record = Record::find($recordId);

        if (!$record || !$record->access) {
            abort(403, 'Нет доступа к этой записи.');
        }

        // Если доступ разрешен, передаем управление дальше
        return $next($request);
    }
}
