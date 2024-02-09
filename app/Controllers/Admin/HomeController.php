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
        // Bắt đầu output buffering
        ob_start();
    
        $this->data['pages'] = 'pages/Admin/Home';
        $this->data['subcontent']['pages_title'] = 'Trang Dashboard';
        $this->data['subcontent']['countUserDashboard'] = $this->province->countUserDashboard();
        $this->data['subcontent']['countLikeDashboard'] = $this->province->countLikeDashboard();
        $this->data['subcontent']['countViewDashboard'] = $this->province->countViewDashboard();
        
        // Gọi hàm render nhưng không gửi dữ liệu ra ngay lập tức
        $this->render('AdminMasterLayout', $this->data);
    
        // Lấy dữ liệu đã được render và gửi đến output buffer
        $content = ob_get_clean();
    
        // Hiển thị dữ liệu đã được lưu trữ trong output buffer
        echo $content;
    }
    
}
