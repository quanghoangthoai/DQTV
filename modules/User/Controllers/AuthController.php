<?php

namespace Modules\User\Controllers;

use Illuminate\Http\Request;
use Modules\User\Models\User;
use Modules\User\Models\UserSocial;
use System\Core\Controllers\WebController;
use Socialite;

class AuthController extends WebController
{
    public function getLoginAdmin(Request $request)
    {
        if (auth('admin')->check())
            return redirect()->route('dashboard');
        return redirect()->route('login');
    }

    /**
     * Login admincp
     */
    public function postLoginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Chưa nhập email',
            'password.required' => 'Chưa nhập mật khẩu'
        ]);

        $is_remember = $request->has('is_remember') ? true : false;

        if (auth('admin')->attempt(['email' => $request->email, 'password' => $request->password], $is_remember)) {
            if (auth('admin')->user()->status == 0) {
                auth('admin')->logout();
                session()->flush();
                $errors = [
                    'loginfaild' => 'Tài khoản của bạn đang bị khóa.'
                ];
            } else {
                if (!check_permission('dashboard')) {
                    auth('admin')->logout();
                    session()->flush();
                    $errors = [
                        'loginfaild' => 'Tài khoản không hợp lệ hoặc không có quyền truy cập.'
                    ];
                } else {
                    if ($request->redirect_to)
                        return redirect()->to(base64_decode($request->redirect_to));
                    return redirect()->route('dashboard');
                }
            }
        } else {
            $errors = [
                'loginfaild' => 'Thông tin đăng nhập không chính xác.'
            ];
        }
        return redirect()->route('login')->withInput()->withErrors($errors);
    }

    public function getLogoutAdmin()
    {
        if (auth('admin')->check()) {
            auth('admin')->logout();
            session()->flush();
        }
        return redirect()->back();
    }

    /**
     * Redirect the user to the Github authentication page
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
}