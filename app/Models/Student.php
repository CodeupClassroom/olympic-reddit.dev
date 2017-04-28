<?php

namespace App\Models;  // PSR-4

// autoloading

// require_once 'App/Models/Student.php'

// str_replace('\', '/', $classname) . '.php'

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
}

