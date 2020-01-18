<?php

namespace App\Functional\Api\V1;

use App\Models\Task;
use App\TestCase;
use Dingo\Api\Http\Response;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Test Task api responses.
 */
class TaskApiTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * Root of tasks api endpoints.
     *
     * @var string
     */
    protected $url = '/api/v1/tasks';
    
    /**
     * Test get task list.
     */
    public function testIndex(): void
    {
        $response = $this->get($this->url);
        $response->assertStatus(Response::HTTP_OK);
    }
    
    /**
     * Test show task.
     */
    public function testShow(): void
    {
        $task = factory(Task::class)->create();
        $response = $this->get($this->url . '/' . $task->id);
        $response->assertStatus(Response::HTTP_OK);
    }
}