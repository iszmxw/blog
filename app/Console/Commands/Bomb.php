<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

class Bomb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bomb:ok';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '短信通知';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * 任务执行的方法
     * @return mixed
     */
    public function handle()
    {
        $res = \App\Library\Bomb::bomb('18576409426');
        if (json_encode($res)['data']['Code'] == "OK") {
            \Log::debug($res);
        } else {
            $res = \App\Library\Bomb::bomb('18576409426');
        }
        return $res;
    }
}
