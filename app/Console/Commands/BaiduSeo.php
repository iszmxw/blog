<?php

namespace App\Console\Commands;

use App\Models\Blog;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class BaiduSeo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'baiduseo:ok';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '追梦小窝的第一个定时任务,百度seo链接自动提交';

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
        //定时执行的任务
        $blog = Blog::getList(['baidu_seo'=>'0'],'gid',0,10);
        foreach($blog as $key=>$val){
            $urls[] = 'http://blog.54zm.com/article/'.$val['gid'];
        }
        //每天推送十条的地址
        $api = 'http://data.zz.baidu.com/urls?appid=1606122614792135&token=zIWbEIZuASc0biYF&type=realtime';
        $data['body'] = implode("\n", $urls);
        $client = new Client();
        $result = $client->post($api,$data);
        $response = $result->getBody()->getContents();
        $dataArr = json_decode($response,true);
        if ($dataArr['success'] > 0){
            foreach($blog as $key=>$val){
                Blog::EditData(['gid'=>$val['gid']],['baidu_seo'=>'1']);
            }
        }
        $file  = 'cron.txt';//要写入文件的文件名（可以是任意文件名），如果文件不存在，将会创建一个
        $content = "百度内容提交成功\r\n";
        file_put_contents($file, $content,FILE_APPEND);
    }
}
