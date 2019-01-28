<?php

namespace App\Types;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $rules = ['description' => 'required'];
    protected $fillale = ['description'];
}
