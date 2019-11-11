<?php

namespace App\Models;

class UserMiniFormid extends Defaults
{
    public $timestamps = true;
    public $dateFormat = 'U';
    public $guarded = [];
    protected $table = 'user_mini_formid';
    protected $primaryKey = 'id';
}
