<?php

namespace App\Contracts\BusinessLayer;

interface IUserProcessor
{
  public function getAll();
  public function find($id);
  public function create($request);
  public function edit($request, $id);
  public function delete($id);
}
