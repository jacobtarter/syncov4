<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array('pid', 'title', 'ptext', 'uid', 'created_at', 'updated_at');
}
