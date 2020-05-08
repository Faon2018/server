<?php
/**
 * Created by PhpStorm.
 * User: Faon
 * Date: 2020/5/8
 * Time: 11:02
 */

namespace app\controller;
//use app\BaseController;
use app\service\User as UserService;
use app\common\Token;
use think\facade\Request;
use think\route\Rule;
use think\route\dispatch\Controller as disController;
//use app\BaseController;

//class User extends BaseController
class User extends BaseController
{
    public function login($username,$password){
//        return json(Request::instance());
        $user=UserService::login($username,$password);
        $data=Token::getToken($user);
        return return_success($data);
//        return json(['data'=>$data,'code'=>200,])
//        return json($data,200);
//        $token =getToken($this->payload, $this->key);
//        $token =getToken($this->payload, $this->key);
//        return json(['name'=>$username,'pass'=>$password],200,['token-api'=>$token]);
    }

    public  function  info(){
        $token=Request::header('api-token');
    }

    public  function  read(){
//        return 1;
        $token=Request::instance()->header('token-api');
//       return json($token);
        $res=Token::verifyToken($token);
        return json($res);
    }
    public  function  test(\think\Request $re){
//        $token =getToken($this->payload, $this->key);
//
//        $info = Request::instance()->header('authorization');
        $info = $re->action();
        return json($info);
    }


}