<?php


namespace App\Library;


use App\Models\Account;

class Tools
{
    // 检测是否手机号码
    public static function isMobile($mobile)
    {
        if (!is_numeric($mobile)) {
            return false;
        }
        return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^16[0,6,7,8]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
    }


    /**
     * 超级管理员代理登录
     * @param $token
     * @param $user_id
     * @return array
     * @author：iszmxw <mail@54zm.com>
     * @time：2020/2/7 17:40
     */
    public static function agent_login($token, $user_id)
    {
        $account = Account::getOne(['id' => $user_id]);
        if (empty($account)) {
            return ['code' => 500, 'message' => '账号不存在，请您换个账户试试！'];
        }
        if ($account['status'] == -1)
            return ['code' => 500, 'message' => '对不起该账户已经被冻结，请您解冻后再来操作！'];
        if ($account['id'] === 1) {
            $roles = 'isadmin';
        } else {
            $roles = 'isaccount';
        }
        // 生成登录用户的信息
        $info = [
            'id'           => $account['id'],
            'token'        => $token,
            'account'      => $account['account'],
            'password'     => $account['password'],
            'roles'        => $roles,
            'role_id'      => $account['role_id'],
            'mobile'       => $account['mobile'],
            'login_time'   => time(),
            'refresh_time' => time()
        ];
        return ['code' => 200, 'message' => 'ok', 'data' => $info];
    }
}