<?php
namespace App\DataLayer;

use App\Contracts\DataLayer\ITaskRepository;
use App\Types\{Task};
/**
 *
 */
class TaskRepository implements ITaskRepository
{
  public function retrieveAll($user_id)
  {
    try
    {
        return Task::where('user_id', $user_id);

    }
    catch(Exeption $e)
    {
      throw $e;
    }
  }

  public function save($request)
  {
    try
    {
      $task = new Task();
      $task->description = $request->description;
      $task->user_id = auth()->id();
      $task->save();

      return $task;

    }
    catch(Exeption $e)
    {
      throw $e;
    }

  }

  public function retrieveById($id)
  {
    try
    {
        return Task::where('id', $id);

    }
    catch(Exeption $e)
    {
      throw $e;
    }
  }

  public function update($request, $id)
  {
    try
    {
      $task = Task::find($id);
      $task-> description = $request->description;
      $task-> save();

    }
    catch(Exeption $e)
    {
      throw $e;
    }
  }

  public function remove($id)
  {
    try
    {
      $task = Task::find($id);
      $task->delete();

    }
    catch(Exeption $e)
    {
      throw $e;
    }
  }
}
