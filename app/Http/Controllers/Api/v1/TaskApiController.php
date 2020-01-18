<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\PaginateRequest;
use App\Http\Transformers\TaskDetailTransformer;
use App\Http\Transformers\TaskListTransformer;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Dingo\Api\Http\Response;

/**
 * TaskApi controller.
 */
class TaskApiController extends BaseApiController
{
    /**
     * Repository for Task entity
     *
     * @var TaskRepository
     */
    protected $taskRepo;
    
    /**
     * TaskApiController constructor.
     *
     * @param TaskRepository $taskRepo Repository for Task entity
     */
    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }
    
    /**
     * Get task list.
     *
     * @param PaginateRequest $request Request with paginate information
     * @param TaskListTransformer $transformer Transform task list to appropriate api response
     *
     * @return Response
     */
    public function index(PaginateRequest $request, TaskListTransformer $transformer): Response
    {
        return $this->response->paginator($this->taskRepo->getTaskList($request->perPage, $request->title), $transformer);
    }
    
    /**
     * Show task.
     *
     * @param Task $task Task to show
     * @param TaskDetailTransformer $transformer Transform task to appropriate api response
     *
     * @return Response
     */
    public function show(Task $task, TaskDetailTransformer $transformer): Response
    {
        return $this->response->item($task, $transformer);
    }
}
