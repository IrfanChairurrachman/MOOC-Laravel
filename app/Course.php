<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // to false insert column insert_at / update_at to database
    public $timestamps = false;
}
