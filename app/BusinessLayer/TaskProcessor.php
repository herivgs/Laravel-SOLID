<?php
namespace App\BusinessLayer;

use App\Contracts\BusinessLayer\ITaskProcessor;
use App\Contracts\DataLayer\ITaskRepository;
use App\Types\Task;
use App\Exceptions\BusinessLayerException;
use Validator;

class TaskProcessor implements ITaskProcessor
{
  private $TaskRepository;

  public function __construct(ITaskRepository $TaskRepository)
  {
    $this->TaskRepository = $TaskRepository;
  }

  public function getAll($user_id)
  {
    try
    {
        return $this->TaskRepository->retrieveAll($user_id);

    }
    catch(BusinessLayerException $e)
    {
      throw $e;
    }
  }

  public function create($request)
  {
    try
    {
      $task = new Task();
      $validator = Validator::make($request->all(), $task->rules);

      if ($validator->fails()) {
        throw new BusinessLayerException($validator->errors(), 'BusinessLayerException', 1);
      }

      return $this->TaskRepository->save($request);
    }
    catch(Exception $e)
    {
      throw $e;

    }
  }

  public function find($id)
  {
    try
    {
      return $this->TaskRepository->retrieveById($id);

    }
    catch(Exception $e)
    {
      throw $e;
    }
  }

  public function edit($request, $id)
  {
    try
    {
      $this->TaskRepository->update($request, $id);

    }
    catch(Exception $e)
    {
      throw $e;
    }

  }

  public function delete($id)
  {
    try
    {
      $this->TaskRepository->remove($id);
    }
    catch(Exception $e)
    {
      throw $e;
    }
  }
}
