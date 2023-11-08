<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class CompleteTaskController extends Controller
{
    /**
     * Nếu trong Controller của bạn chỉ có một phương thức và nó được dùng chỉ để xử lý cho một route,
     * và nếu bạn khó nghĩ quá trong cách đặt tên thì bạn có thể nghĩ đến cách dùng phương thức __invoke.
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Task $task)
    {
        $task->is_completed = $request->is_completed;
        $task->save();

        return TaskResource::make($task);
    }
}
