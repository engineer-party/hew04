<?php

namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Socialite;
use Hash;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * ログイン関数
     *
     * @param Request $request
     * @return /loginにリダイレクト
     *
     * @author Seiya
     */
    public function login(Request $req)
    {
        $email = $req->email;
        $password = $req->password;

        $valid = Validator::make($req->all(), [
            'email' => 'required|email|max:191',
            'password' => 'required|string|min:8|max:191',
        ]);
        if ($valid->fails()) {
            //$msg = '値が不正です。';
            return redirect()->back()->withErrors($valid->errors())->withInput();
            //return redirect()->back()->with('message', $msg);
        }
        // ログイン処理
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('top');
        } else {
            $msg = 'ログインに失敗しました。';
            return redirect()->back()->with('message', $msg);
        }
    }

    /**
     * 新規会員登録関数
     *
     * @param Request $request
     * @return /topにリダイレクト
     *
     * @author Seiya
     */
    public function signup(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:191|unique:users',
            'password' => 'required|string|min:8|max:191',
        ]);

        if ($validator->fails()) {
            //$msg = '値が不正です。';
            return redirect()->back()->withErrors($validator->errors())->withInput();
            //return redirect()->back()->with('message', $msg);;
        }

        $password = bcrypt($req->password);
        $user = User::create([
            'name'     => $req->name,
            'email'    => $req->email,
            'password' => $password,
            'point'    => 0,
            'img_url'  => '0.png',
        ]);

        // ログイン処理
        Auth::login($user);

        return redirect()->route('top');
    }

    public function redirectTo($provider)
    {
        // ソーシャルへのリダイレクト
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        if($provider == 'google'){
            $pUser = Socialite::driver($provider)->stateless()->user();
        }
        // ここがTwitterの処理エラーが出ます
        else{
            // $pUser = Socialite::driver($provider)->user();
            // dd(Socialite::with($provider)->user());
            try {
                $pUser = Socialite::driver($provider)->user();
            } catch(\Exception $e) {
                return redirect('/login')->with('oauth_error', '予期せぬエラーが発生しました');
            }
        }
        // ここまで
        // email が合致するユーザーを取得
        $user = User::where('email', $pUser->getEmail())->first();
        if ($user) {
            // ログイン処理
            Auth::login($user);
            return redirect()->route('top');
        } else {
            // 見つからなければ新しくユーザーを作成
            $user = $this->createUserByProvider($pUser);
            Auth::login($user);
            return redirect()->route('top');
        }
    }

    /**
     * Google で新規会員登録関数
     *
     * @param [type] $pUser
     * @return $user
     *
     * @author Seiya
     */
    public function createUserByProvider($pUser)
    {
        $user = User::create([
            'name'           => $pUser->name,
            'email'          => $pUser->email,
            'password'       => Hash::make(uniqid()),
        ]);

        return $user;
    }

    /**
     * ログアウト関数
     *
     * @return /loginにリダイレクト
     *
     * @author Seiya
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

}
