<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Userqq extends Defaults
{
    use SoftDeletes;
    public $timestamps = true;
    public $dateFormat = 'U';
    public $guarded = [];
    protected $table = 'user_qq';
    protected $primaryKey = 'id';
}
