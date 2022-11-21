<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Regist extends BaseController
{
    protected $UsersModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();
    }

    public function prosesRegist()
    {
        // dd($this->UsersModel->save([
        //     'username' => $this->request->getVar('username'),
        //     'password' => $this->request->getVar('password'),
        //     'name' => $this->request->getVar('name'),
        //     'level' => 3,
        //     'stat' => 1
        // ]));
        // dd('asd');
        $tombol = $this->request->getVar('tombol');
        if ($tombol == 'back') {
            return redirect()->to('/');
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
                ],
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi'
                    ]
                ]
            ])) {
                return redirect()->to('/regist');
            }
            // dd($data_user);
            $this->UsersModel->save([
                'username' => $this->request->getVar('username'),
                'password' => $this->request->getVar('password'),
                'name' => $this->request->getVar('name'),
                'leve' => 3
                // 'stat' => 1
            ]);
            session()->setFlashdata('pesan', 'Data Berhasil disimpan');
            return redirect()->to('/regist');
        }
    }
}
