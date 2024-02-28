<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\HomeModel;

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
        $this->model('Admin', 'HomeModel');
        $this->province = new HomeModel();
    }
    public function index()
    {
        $this->data['pages'] = 'pages/Admin/Home';
        $this->data['subcontent']['pages_title'] = 'Trang Dashboard';
        $this->data['subcontent']['countUserDashboard'] = $this->province->countUserDashboard();
        $this->data['subcontent']['countLikeDashboard'] = $this->province->countLikeDashboard();
        $this->data['subcontent']['countViewDashboard'] = $this->province->countViewDashboard();
        $this->render('AdminMasterLayout', $this->data);
    }
    
}
