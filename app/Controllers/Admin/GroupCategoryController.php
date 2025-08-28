<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class GroupCategoryController extends BaseController
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
            'page' => 'Kelompok Kategori'
        ];

        return view('admin/group_category/index', $data);
    }
}
