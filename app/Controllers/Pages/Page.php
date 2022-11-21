<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

class Page extends BaseController
{
    public function index()
    {
        return view('pages/static/login-regist/login');
    }

    public function dashboardSuperAdmin()
    {
        if (session()->get('stat') != 'loginSuperAdmin') {
            return redirect()->to('/');
        }

        return view('pages/static/super-admin/dashboard');
    }

    public function dashboardAdmin()
    {
        if (session()->get('stat') != 'loginAdmin') {
            return redirect()->to('/');
        }

        return view('pages/static/admin/dashboard');
    }

    public function dashboardUser()
    {
        if (session()->get('stat') != 'loginUser') {
            return redirect()->to('/');
        }

        return view('pages/static/user/dashboard');
    }

    public function regist()
    {
        return view('pages/static/login-regist/regist');
    }
}
