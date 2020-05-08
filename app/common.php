<?php
// 应用公共文件

function return_success($data){
    return json(['data'=>$data,'code'=>200,'msg'=>null]);
}

function return_error($msg){
    return json(['msg'=>$msg,'code'=>200,'data'=>null]);
}