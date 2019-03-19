<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class UserMini extends Defaults
{
    use SoftDeletes;
    public $timestamps = true;
    public $dateFormat = 'U';
    public $guarded = [];
    protected $table = 'user_mini';
    protected $primaryKey = 'id';
}
