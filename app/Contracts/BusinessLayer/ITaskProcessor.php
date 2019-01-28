<?php

namespace App\Contracts\BusinessLayer;

interface ITaskProcessor
{
  public function getAll($user_id);
  public function find($id);
  public function create($request);
  public function edit($request, $id);
  public function delete($id);
}
