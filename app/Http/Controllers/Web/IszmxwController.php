<?php
/**
 * Created by PhpStorm.
 * User: mail
 * Date: 2020/06/15
 * Time: 15:47
 */

namespace App\Http\Controllers\Web;

use GuzzleHttp\Client;
use QL\QueryList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IszmxwController extends Controller
{
    public function mp3(Request $request)
    {
        $id    = $request->get('id');
        $music = $request->get('music');
        if (isset($music) && isset($id)) {
            switch ($id) {
                case 29769734:
                    return '{"url":"https://music.163.com/song/media/outer/url?id=29769734.mp3"}';
                case 461080452:
                    return '{"url":"https://music.163.com/song/media/outer/url?id=461080452.mp3"}';
                case 208889:
                    return '{"url":"https://music.163.com/song/media/outer/url?id=208889.mp3"}';
                case 406070435:
                    return '{"url":"https://music.163.com/song/media/outer/url?id=406070435.mp3"}';
                case 32743519:
                    return '{"url":"https://music.163.com/song/media/outer/url?id=32743519.mp3"}';
                case 1351635310:
                    return '{"url":"https://music.163.com/song/media/outer/url?id=1351635310.mp3"}';
                case 31445474:
                    return '{"url":"https://music.163.com/song/media/outer/url?id=31445474.mp3"}';
            }
        } else {
            $json = '
    [
    {
        "name":"Glad You Came",
        "song_id":29769734,
        "cover":"https://p2.music.126.net/h3uSv4hgZmJK1Q9Kcjtszg==/109951164473961104.jpg?param=200y200",
        "author":"Boyce Avenue"
    },
    {
        "name":"认真地老去",
        "song_id":461080452,
        "cover":"https://p2.music.126.net/LwisuwyurwWs3zpkoBIC9g==/19024849695642179.jpg?param=200y200",
        "author":"张希&曹方"
    },
    {
        "name":"别找我麻烦",
        "song_id":208889,
        "cover":"https://p2.music.126.net/KSrqsJKY88n4QgsLo-t3Jg==/109951164795671702.jpg?param=200y200",
        "author":"蔡健雅"
    },
    {
        "name":"小樱",
        "song_id":406070435,
        "cover":"https://p2.music.126.net/ejJnFAcW3kgPXu_ChaL9Kg==/109951164291843663.jpg?param=200y200",
        "author":"饭碗的彼岸"
    },
    {
        "name":"江上清风游",
        "song_id":32743519,
        "cover":"https://p2.music.126.net/rxtmC5LLUxMfWx7szJr-bw==/7968160767131459.jpg?param=200y200",
        "author":"变奏的梦想"
    },
    {
        "name":"城南花已开 ❁ 愿君彼安好（Remake）（翻自 三亩地） ",
        "song_id":1351635310,
        "cover":"https://p2.music.126.net/fROLf2j_ua4VPv98P65Y6Q==/109951164141716409.jpg?param=200y200",
        "author":"桑子"
    },
    {
        "name":"寻",
        "song_id":31445474,
        "cover":"https://p2.music.126.net/tgkN397ohC6XpqRRHzndLw==/2925800441997173.jpg?param=200y200",
        "author":"三亩地"
    }
]
    ';
            echo $json;
        }
    }

    public function photo(Request $request)
    {
        $id       = $request->get('id');
        $password = $request->get('password');
    }
}