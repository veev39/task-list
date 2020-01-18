<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Contracts\Pagination\Paginator;

/**
 * Repository for Task entity.
 */
class TaskRepository
{
    /**
     * Get task list with pagination and search.
     *
     * @param int|null $perPage count of item per page
     * @param string|null $title title to search
     *
     * @return Paginator
     */
    public function getTaskList(?int $perPage, ?string $title): Paginator
    {
        return Task::where(function ($query) use ($title){
            if($title){
                $query->where(Task::TITLE, "LIKE", '%'.$title.'%');
            }
        })->paginate($perPage);
    }
    
}