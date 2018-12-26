<?php

namespace App\Http\Controllers\Api;

use App\Library\HttpCurl;
use App\Models\Blog;
use App\Models\Options;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Xiongzhang\Constant\SdkConfig;
use Xiongzhang\Server;

class BaiduController extends Controller
{
    //token
    public function xiongzhang(Request $request)
    {
        $request = file_get_contents("php://input");
        Options::where('option_name','widgets3')->update(['option_value'=>$request]);
        /**
         * 开发者设置
         */
        $xzhLib = Server::init(config('baidu.xiongzhang'));
        $msgType = $xzhLib->getRevType();
        $msgData = $xzhLib->getRevData();
        $xzhLib::$log->notice("Rev msgType: {$msgType} msgData:" . json_encode($msgData));
        // 根据消息类型，做业务响应
        switch ($msgType) {
            case SdkConfig::MSGTYPE_TEXT:
                // 文本类型 $content 开发者根据$msgData自己组织回复
                $xzhLib->text(SdkConfig::REV_TEXT_DEFAULT_REPLY)->reply();
                Options::where('option_name','widgets4')->update(['option_value'=>SdkConfig::REV_TEXT_DEFAULT_REPLY]);
                break;
            case SdkConfig::MSGTYPE_EVENT:
                // 事件类型（如不需跟开发者交互，返回success即可）
                $event = $msgData['Event'];
                switch ($event) {
                    case SdkConfig::EVENT_SUBSCRIBE:
                        $xzhLib->text(SdkConfig::EVENT_SUBSCRIBE)->reply();
                        break;
                    case SdkConfig::EVENT_UNSUBSCRIBE:
                        $xzhLib->text(SdkConfig::EVENT_UNSUBSCRIBE)->reply();
                        break;
                    case SdkConfig::EVENT_MENU_VIEW:
                        $xzhLib->text(SdkConfig::EVENT_MENU_VIEW)->reply();
                        break;
                    case SdkConfig::EVENT_MENU_CLICK:
                        $xzhLib->text(SdkConfig::EVENT_MENU_CLICK)->reply();
                        break;
                    default:
                        //TODO 如有新增事件，在补充
                        $xzhLib->text(SdkConfig::REV_NOT_KNOW_MSGTYPE_REPLY)->reply();
                }
                break;
            case SdkConfig::MSGTYPE_IMAGE:
                // 返回一张图片，注意回复的图片 mediaId 需要先上传
                $xzhLib->image(691654)->reply();
                break;
            case SdkConfig::MSGTYPE_VOICE:
//                $xzhLib->voice(691654)->reply();
                $xzhLib->text('waiting!!!')->reply();
                break;
            case SdkConfig::MSGTYPE_PAY:
                $payEvent = $msgData['Event'];
                switch ($payEvent) {
                    case SdkConfig::EVENT_PAY_PAY:
                        $xzhLib->pay(1)->reply();
                        break;
                    case SdkConfig::EVENT_PAY_REFUND:
                        $xzhLib->refund()->reply();
                        break;
                    default:
                        $xzhLib::$log->notice('pay event error; event:' . $payEvent);
                        $xzhLib->text('')->reply();
                }
                break;
            default:
                // TODO 如有新增消息类型，在补充
                $xzhLib->text(SdkConfig::REV_SUCCESS_REPLY)->reply();
        }
    }

    public function push_content(Request $request)
    {
        $api = 'http://data.zz.baidu.com/urls?appid=1606122614792135&token=zIWbEIZuASc0biYF&type=realtime';
        $blog = Blog::getList([],'gid',0,10);
        foreach($blog as $key=>$val){
            $urls[] = 'http://blog.54zm.com/article/'.$val['gid'];
        }
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        echo $result;
    }

    /**
     * 用sha1算法生成安全签名
     * @param string $strToken 票据
     * @param string $intTimeStamp 时间戳
     * @param string $strNonce 随机字符串
     * @param string $strEncryptMsg 密文消息
     * @return string
     */
    function getSHA1($strToken, $intTimeStamp, $strNonce, $strEncryptMsg = '')
    {
        $arrParams = array(
            $strToken,
            $intTimeStamp,
            $strNonce,
        );
        if (!empty($strEncryptMsg)) {
            array_unshift($arrParams, $strEncryptMsg);
        }
        sort($arrParams, SORT_STRING);
        $strParam = implode($arrParams);
        return sha1($strParam);
    }

}
