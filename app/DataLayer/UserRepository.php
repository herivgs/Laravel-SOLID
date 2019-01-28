<?php
namespace App\DataLayer;

use App\Contracts\DataLayer\IUserRepository;
use App\Types\{User};
/**
 *
 */
class UserRepository implements IUserRepository
{
  public function retrieveAll()
  {
    try
    {
        return User::all();
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
      $task = new User();
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
        return User::where('id', $id);

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
      $task = User::find($id);
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
      $task = User::find($id);
      $task->delete();

    }
    catch(Exeption $e)
    {
      throw $e;
    }
  }
}
