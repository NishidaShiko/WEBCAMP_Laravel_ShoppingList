<?php

declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterPost;
use App\Http\Controllers\Controller;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ユーザー登録ページ
        public function register()
    {
        return view('user/register');
    }
    // 登録する
    public function index(UserRegisterPost $request)
    {
        // データの取得
        $datum = $request->validated();

        // パスワードのハッシュ化
        $datum['password'] = Hash::make($datum['password']);

        try{
        $r =UserModel::create($datum);
        }catch(Throwable $e){
        }
         $request->session()->flash('front.task_register_success', true);

         return redirect('/');

    // ユーザを登録完了
        $request->session()->flash('front.task_register_success', true);


        return redirect('/index');
    }
}