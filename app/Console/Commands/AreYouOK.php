<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AreYouOK extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'areyou:ok';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '追梦小窝的第一个定时任务';

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
     *
     * @return mixed
     */
    public function handle()
    {
        //定时执行的任务
        $file  = 'cron.txt';//要写入文件的文件名（可以是任意文件名），如果文件不存在，将会创建一个
        $content = "第一次写入的内容\n";
        file_put_contents($file, $content,FILE_APPEND);
    }
}
