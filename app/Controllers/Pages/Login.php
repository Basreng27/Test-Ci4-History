<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class Login extends BaseController
{
    protected $LoginModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel();
    }

    public function prosesLogin()
    {
        $tombol = $this->request->getVar('tombol');

        if ($tombol == 'regist') {
            return redirect()->to('/regist');
        } else {
            if (!$this->validate([
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/');
            }

            $username = $this->request->getVar('username');
            $getPassword = $this->request->getVar('password');
            $password = md5($getPassword);

            $cekLogin = $this->LoginModel->getUser($username, $password);
            if (empty($cekLogin)) {
                return redirect()->to('/');
            } else {
                if ($cekLogin['stat'] == true) {
                    if ($cekLogin['level'] == 1) { //superadmin
                        $data_session = array(
                            'username' => $username,
                            'name' => $cekLogin['name'],
                            'stat' => "loginSuperAdmin"
                        );
                        session()->set($data_session);

                        return redirect()->to('/dahsboard-SuperAdmin');
                    } elseif ($cekLogin['level'] == 2) { //admin
                        $data_session = array(
                            'username' => $username,
                            'name' => $cekLogin['name'],
                            'stat' => "loginAdmin"
                        );
                        session()->set($data_session);

                        return redirect()->to('/dahsboard-Admin');
                    } elseif ($cekLogin['level'] == 3) {
                        $data_session = array(
                            'username' => $username,
                            'name' => $cekLogin['name'],
                            'stat' => "loginUser"
                        );
                        session()->set($data_session);

                        return redirect()->to('/dahsboard-User');
                    } else {
                        return redirect()->to('/');
                    }
                } else {
                    return redirect()->to('/');
                }
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
