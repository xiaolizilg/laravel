<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Admin;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests\admin\AdminRequest;
use Illuminate\Support\Facades\DB;

class UloginController extends Controller
{
    /**
     * 登陆页面
     */
    public function index()
    {

      $user_info  = session('session_user')?session('session_user'):'';
      if($user_info){
        return redirect('admin/index');
      }
      return  view('auth.ulogin.index');
    }


    /**
     * 登陆验证
     */
    public function login(AdminRequest $request)
    {

        $user_name =  htmlentities($request->input('user_name'));
        $password  =  htmlentities($request->input('password'));
       
        if ($user_name) {

           $info = Admin::where(['user_name'=>$user_name,'status'=>'1'])->first();

           if ($info) {

                if ($info['password'] == md5($password.$info['solt'])) {
                  
                  //更新登录时间
                  Admin::where('user_id',$info['user_id'])->update([
                        'last_login'=>time(),
                        'last_ip'=> GetHostByName($_SERVER['SERVER_NAME'])]
                  );
                   //存session
                   session(['session_user'=>$info]);
                   return response()->json(['error'=>0,'msg'=>'登录成功']);
                }

                return response()->json(['error'=>1,'msg'=>'用户名或密码错误']);
               
           }
           return response()->json(['error'=>1,'msg'=>'您的账户不存在或被禁用']);
        }

        return response()->json(['error'=>1,'msg'=>'请输入用户名']);

    }

    public function logout(Request $request){

      //清空session
      $request->session()->flush();
      return redirect('auth/ulogin/index');

    }

}
