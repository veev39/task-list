<?php

namespace App\Http\Transformers;

use App\Models\Task;
use League\Fractal\TransformerAbstract;

/**
 * Transform task detail to appropriate api response.
 */
class TaskDetailTransformer extends TransformerAbstract
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
            'author' => $task->author,
            'description' => $task->description,
            'status' => $task->status,
            'date' => $task->created_at->format('d/m/Y H:i:s'),
        ];
    }
}