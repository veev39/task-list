<?php

namespace App\Http\Transformers;

use App\Models\Task;
use League\Fractal\TransformerAbstract;

/**
 * Transform task list to appropriate api response.
 */
class TaskListTransformer extends TransformerAbstract
{
    /**
     * Transform task.
     *
     * @param Task $task Task to transform
     *
     * @return array
     */
    public function transform(Task $task): array
    {
        return [
            'id' => $task->id,
            'title' => $task->title,
            'date' => $task->created_at->format('d/m/Y H:i:s'),
        ];
    }
}