<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
	protected $table = "content";
	protected $guarded = [];
    use SoftDeletes;
}
