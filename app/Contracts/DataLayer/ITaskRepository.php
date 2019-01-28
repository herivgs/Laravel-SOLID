<?php
namespace App\Contracts\DataLayer;

interface ITaskRepository
{
  public function retrieveAll($user_id);
  public function retrieveById($id);
  public function save($request);
  public function update($request, $id);
  public function remove($id);
}
