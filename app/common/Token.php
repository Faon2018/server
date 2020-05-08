<?php
/**
 * Created by PhpStorm.
 * User: Faon
 * Date: 2020/5/7
 * Time: 14:09
 */

namespace app\common;

use Firebase\JWT\JWT;
class Token
{
    //加密关键词
    private static $key;
    //签发者
    private static $iss;
    //jwt所面向的用户
    private static $aud;
    //在什么时间之后该jwt才可用
    private static $nbf;
    //过期时间
    private static $exp;
    //leeway in seconds
    private static $leeway;

    public  static  function  init(){
        self::$key=md5('blog');
        self::$iss='faon';
        self::$aud='blog.com';
        self::$nbf=10;
        self::$exp=1800;
        self::$leeway=60;
    }



    public static  function getToken($userData){
        $time=time();
        $payload=[
            'iss'=>self::$iss,
            'aud'=> self::$aud,
//            'iat'=>null,
            'nbf'=>$time+self::$nbf,
            'exp'=>$time+self::$exp,
            'data'=>[
                'id'=>$userData['id'],
                'username'=>$userData['name']
            ]

        ];
        $jwt = JWT::encode($payload,self::$key);
        return $jwt;
    }

    public static function  verifyToken($jwt){
       self::init();
        JWT::$leeway =self::$leeway;
        $decoded = JWT::decode($jwt,self::$key, array('HS256'));
        return $decoded;
    }
}