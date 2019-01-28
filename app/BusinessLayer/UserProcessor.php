<?php
namespace App\BusinessLayer;

use App\Contracts\BusinessLayer\IUserProcessor;
use App\Contracts\DataLayer\IUserRepository;
use App\Types\User;
use App\Exceptions\BusinessLayerException;
use Validator;

class UserProcessor implements IUserProcessor
{
  private $UserRepository;

  public function __construct(IUserRepository $UserRepository)
  {
    $this->UserRepository = $UserRepository;
  }

  public function getAll()
  {
    try
    {
        return $this->UserRepository->retrieveAll();

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
      $user = new User();
      $validator = Validator::make($request->all(), $user->rules);

      if ($validator->fails()) {
        throw new BusinessLayerException($validator->errors(), 'BusinessLayerException', 1);
      }

      return $this->UserRepository->save($request);
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
      return $this->UserRepository->retrieveById($id);

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
      $this->UserRepository->update($request, $id);

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
      $this->UserRepository->remove($id);
    }
    catch(Exception $e)
    {
      throw $e;
    }
  }
}
