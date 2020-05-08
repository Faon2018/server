<?php
declare (strict_types = 1);

namespace app\middleware;
use app\common\Token;
use think\Request;
use think\route\dispatch\Controller;
class CheckToken
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle(Request $request, \Closure $next)
    {
//        (Controller::class);
        return json($request->url());
//        return json($request->pathinfo());
//        return json($request->action());
//          if ($request->action() !== 'login'){
//              $token=$request->header('api-token');
//              return json($token);
//              if ($token){
//                  $res=Token::verifyToken($token);
//                  return return_success($res);
//              }else{//不存在token
//
//              }
//          }
//        if ($request->param('name') == 'think') {
//            return redirect('index/think');
//        }
        return $next($request);
    }
}
