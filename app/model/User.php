<?php
/**
 * Created by PhpStorm.
 * User: Faon
 * Date: 2020/5/7
 * Time: 14:36
 */

namespace app\model;
use think\Model;
class User extends Model
{
    protected  $table='user';
    public static function selectUser($username,$password){
//        $user=self::get($search);
        $user=self::where('name', $username)->where('password',$password)->find();
//        $user=self::find(1);
        return $user;
    }
}