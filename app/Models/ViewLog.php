<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

class ViewLog extends Defaults
{
    use SoftDeletes;
    public $timestamps = true;
    public $dateFormat = 'U';
    protected $table = 'view_log';
    protected $primaryKey = 'id';

}