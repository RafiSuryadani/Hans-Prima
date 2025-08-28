<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AdminController extends BaseController
{
    public $db, $session, $validation;

    public function __construct()
    {
        $this->db = db_connect();
        $this->session = Services::session();
        $this->validation = Services::validation();
    }

    public function index()
    {
        $data = [
            'page' => 'Dashboard Admin'
        ];

        return view('admin/dashboard', $data);
    }

    public function form()
    {
        $data = [
            'page' => 'Form Admin'
        ];

        return view('admin/form', $data);
    }

    public function table()
    {
        $data = [
            'page' => 'Table Admin'
        ];

        return view('admin/table', $data);
    }
}
