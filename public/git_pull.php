<?php
/**
 * Created by PhpStorm.
 * User: iszmxw
 * Date: 2021/10/08
 * Time: 12:49
 */

$pwd = __DIR__ . "/../";
exec("cd {$pwd} && git pull", $res);
var_dump($res);
