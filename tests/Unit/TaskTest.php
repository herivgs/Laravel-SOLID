<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Types\Task;
use App\BusinessLayer\TaskProcessor;
use App\Contracts\DataLayer\ITaskRepository;
use App\Contracts\BusinessLayer\ITaskProcessor;
use App\Exceptions\BusinessLayerException;

class TaskTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTaskProcessorGetAllShouldSucceed()
    {
        // Arrange
        $user_id = 1;
        $mockTaskRepository = \Mockery::mock(ITaskRepository::class);

        // Assert before act
        $mockTaskRepository
            ->shouldReceive('retrieveAll')
            ->with($user_id)
            ->once()
            ->andReturn([new Task(), new Task()]);

        // Act
        $processor = new TaskProcessor($mockTaskRepository);
        $task = $processor->getAll($user_id);

        // Assert after act
        $this->assertCount(2, $task);
    }

    public function testTaskProcessorGetAllShouldFail()
    {
        // Arrange
        $user_id = 1;
        $mockTaskRepository = \Mockery::mock(ITaskRepository::class);

        // Assert before act
        $mockTaskRepository
            ->shouldReceive('retrieveAll')
            ->with($user_id)
            ->once()
            ->andThrow(new BusinessLayerException(['error'], 'BusinessLayerException', 1));

        try {
            // Act
            $processor = new TaskProcessor($mockTaskRepository);
            $task = $processor->getAll($user_id);
        }
        catch(BusinessLayerException $e) {
            // Assert after act
            $this->assertInstanceOf(BusinessLayerException::class, $e);
        }

    }
}
