<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\BaseModel;

class HomeController extends BaseController
{
    public $province;
    public $data = [];
    public function __construct()
    {
        if (empty($_SESSION['user_admin'])) {
            header('Location: ' . _WEB_ROOT . '/signinAdmin');
        }
        $this->data['subcontent']['home'] = '';
        $this->province = new BaseModel();
    }
    public function index()
    {
        $this->data['pages'] = 'pages/Admin/Home';
        $this->data['subcontent']['pages_title'] = 'Trang Dashboard';
        $this->data['subcontent']['countUserDashboard'] = $this->province->count('users', 'user_id', 'count', 'user_role = :1', ['1' => 1]);
        $this->render('AdminMasterLayout', $this->data);
    }
    
}
