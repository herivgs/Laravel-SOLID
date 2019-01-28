<?php
namespace App\Contracts\DataLayer;

interface IUserRepository
{
  public function retrieveAll();
  public function retrieveById($id);
  public function save($request);
  public function update($request, $id);
  public function remove($id);
}
