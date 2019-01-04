<?php
namespace app\api\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'user_name'  =>  'require|max:20',
        'pwd' =>  'require|max:20',
    ];

    protected $message = [
        'user_name.require'  =>  '请输入用户名',
        'user_name.max'  =>  '用户名不能超过20个字符',
        'pwd.require' =>  '请输入密码',
        'pwd.require'  =>  '密码不能超过20个字符',
    ];
}
