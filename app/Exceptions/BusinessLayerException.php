<?php

namespace App\Exceptions;

use Exception;

class BusinessLayerException extends Exception
{
  public $errors;

  public function __construct($errors, $message, $code, Exception $previous = NULL)
    {
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }
  /**
   * Report or log an exception.
   *
   * @return void
   */
  public function report()
  {
      \Log::debug('Business Layer Excception: '. $errors);
  }
}
