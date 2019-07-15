<?php

namespace App\Library;


class Tooling
{
    /**
     * @param $content
     * @param null $strlen
     * @return bool|mixed|null|string|string[]
     * 富文本格式化内容工具
     */
    public static function tool_purecontent($content, $strlen = null){
        $content = str_replace('继续阅读&gt;&gt;', '', $content);
        $content = preg_replace("/\[hide\](.*)\[\/hide\]/Uims", '|*********此处内容回复可见*********|', strip_tags($content));
        if ($strlen) {
            $content = self::subString($content, 0, $strlen);
        }
        return $content;
    }

    /**
     * @param $strings -预处理字符串
     * @param $start -开始处 eg:0
     * @param $length -截取长度
     * @return bool|string
     * 截取编码为utf8的字符串
     */
    public static function subString($strings, $start, $length) {
        if (function_exists('mb_substr') && function_exists('mb_strlen')) {
            $sub_str = mb_substr($strings, $start, $length, 'utf8');
            return mb_strlen($sub_str, 'utf8') < mb_strlen($strings, 'utf8') ? $sub_str . '...' : $sub_str;
        }
        $str = substr($strings, $start, $length);
        $char = 0;
        for ($i = 0; $i < strlen($str); $i++) {
            if (ord($str[$i]) >= 128)
                $char++;
        }
        $str2 = substr($strings, $start, $length + 1);
        $str3 = substr($strings, $start, $length + 2);
        if ($char % 3 == 1) {
            if ($length <= strlen($strings)) {
                $str3 = $str3 .= '...';
            }
            return $str3;
        }
        if ($char % 3 == 2) {
            if ($length <= strlen($strings)) {
                $str2 = $str2 .= '...';
            }
            return $str2;
        }
        if ($char % 3 == 0) {
            if ($length <= strlen($strings)) {
                $str = $str .= '...';
            }
            return $str;
        }
    }
}
