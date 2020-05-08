<?php
/**
 * Created by PhpStorm.
 * User: Faon
 * Date: 2020/5/7
 * Time: 14:45
 */

namespace app\service;
use app\model\User as userModel;
class User
{

    public static function  login($username,$password){
        return userModel::selectUser($username,$password);
    }
}