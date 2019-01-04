<?php

namespace app\Index\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Validate;


class User extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }

    public function logins()
    {
        return view('user/user');
    }

    public function login(Request $request)//登陆接口
    {
        header('Access-Control-Allow-Origin:*');
        if($request->isPost()){
            $data=input('post.');
            $result = $this->validate($data,'User');
            dump($result);
            if(true !== $result){
                return json(['status' => 'error','msg' => '用户名或者密码格式不正确！']);
            }
//            $password=substr(md5($data['pwd']),8,16);
              $pwd = md5($data['pwd']);
            $result=Db::name('userlist')->where('user_name',$data['user_name'])->where('pwd',$pwd)->find();
            if($result){
                switch ($result['status']) {
                    case '0':
                    case '1':
                        session('id', $result['id']);
                        return json(['status' => 'success','msg' => '登陆成功！']);
                        break;
                    case '2':
                        return json(['status' => 'error','msg' => '用户已被禁用，请联系管理员！']);
                        break;
                }
            }else{
                return json(['status' => 'error','msg' => '用户名或者密码错误！']);
            }
        }
    }



}
