<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;

use App\Types\Task;
use App\BusinessLayer\TaskProcessor;
use App\Contracts\BusinessLayer\ITaskProcessor;
use App\Http\Controllers\Controller;
use App\Exceptions\BusinessLayerException;

class TaskService extends Controller
{
  /**
   * The Task repository instance
   *
   * @var ITaskProcessor
   */
  protected $TaskProcessor;
  /**
   * Create a new controller instance.
   *
   * @param ITaskProcessor $TaskProcessor
   */
  public function __construct(ITaskProcessor $TaskProcessor)
  {
      $this->middleware('auth');
      $this->TaskProcessor = $TaskProcessor;
  }

  public function index()
  {
      $tasks = $this->TaskProcessor->getAll(auth()->id())->get();

      if ($tasks->toArray())
      {
          return response()->json($tasks->toArray(), 200);
      }
      else
      {
        return response()->json($tasks->toArray(), 404);
      }
  }

  public function store(Request $request)
  {
    try
    {
      $store = $this->TaskProcessor->create($request);
      return response()->json($store, 200);
    }
    catch(BusinessLayerException $e)
    {
      return response()->json($e->errors, 400);
    }
  }

  public function show($id)
  {
    $tasks = $this->TaskProcessor->find($id);

    if (!$tasks->toJson())
    {
      return response()->json($tasks->toJson(), 200);
    }
    else
    {
      return response()->json($tasks->toJson(), 404);
    }
  }

  public function update(Request $request, $id)
  {
    $this->TaskProcessor->edit($request, $id);
    return response()->json(null, 200);
  }

  public function destroy($id)
  {
    $this->TaskProcessor->delete($id);
    return response()->json(null, 200);
  }
}
