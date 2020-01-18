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
     * Get paginated task list.
     *
     * @param int|null $perPage count of item per page
     *
     * @return Paginator
     */
    public function paginate(?int $perPage): Paginator
    {
        return Task::paginate($perPage);
    }
    
}