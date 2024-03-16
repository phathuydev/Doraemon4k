<?php

namespace App;

use Core\Route;
use Core\RouteNotFoundException;
use App\Controllers\Admin\HomeController as HomeAdminController;
use App\Controllers\Client\HomeController as HomeClientController;
use App\Controllers\Client\AuthController as AuthClientController;
use App\Controllers\Client\VideoController as VideoClientController;
use App\Controllers\Client\VideoApiController as VideoApiClientController;
use App\Controllers\Admin\UserController as UserAdminController;
use App\Controllers\Admin\CommentController as CommentAdminController;
use App\Controllers\Admin\VideoController as VideoAdminController;
use App\Controllers\Admin\VideoApiController as VideoApiAdminController;
use App\Controllers\Admin\ApiController as ApiAdminController;
use App\Controllers\Admin\CategoryController as CategoryAdminController;
use App\Controllers\Admin\AuthController as AuthAdminController;

class routes
{
    public function __construct()
    {
        $route = new Route;
        $route->get('', [HomeClientController::class, 'index'])
            ->get('/home', [HomeClientController::class, 'index'])
            ->post('/home', [HomeClientController::class, 'index'])
            ->get('/signin', [AuthClientController::class, 'index'])
            ->post('/signin', [AuthClientController::class, 'index'])
            ->get('/signup', [AuthClientController::class, 'signup'])
            ->post('/signup', [AuthClientController::class, 'signup'])
            ->get('/forgotPassword', [AuthClientController::class, 'forgot'])
            ->post('/forgotPassword', [AuthClientController::class, 'forgot'])
            ->get('/changePassword', [AuthClientController::class, 'reset'])
            ->post('/changePassword', [AuthClientController::class, 'reset'])
            ->get('/signout', [AuthClientController::class, 'signout'])
            ->get('/videoApi', [VideoApiClientController::class, 'index'])
            ->get('/videoApiDetail', [VideoApiClientController::class, 'detail'])
            ->post('/videoApiDetail', [VideoApiClientController::class, 'detail'])
            ->get('/videoSearch', [VideoApiClientController::class, 'search'])
            ->get('/userManage', [UserAdminController::class, 'index'])
            ->get('/searchUserManage', [UserAdminController::class, 'search'])
            ->get('/commentManage', [CommentAdminController::class, 'index'])
            ->post('/commentManage', [CommentAdminController::class, 'index'])
            ->get('/ApiManage', [ApiAdminController::class, 'index'])
            ->post('/ApiManage', [ApiAdminController::class, 'index'])
            ->get('/DetailMovie', [ApiAdminController::class, 'detail'])
            ->post('/DetailMovie', [ApiAdminController::class, 'detail'])
            ->get('/videoManage', [VideoAdminController::class, 'index'])
            ->post('/videoManage', [VideoAdminController::class, 'index'])
            ->get('/searchVideo', [VideoAdminController::class, 'search'])
            ->post('/searchVideo', [VideoAdminController::class, 'search'])
            ->get('/videoManage/createVideo', [VideoAdminController::class, 'create'])
            ->post('/videoManage/createVideo', [VideoAdminController::class, 'create'])
            ->get('/videoManage/updateVideo', [VideoAdminController::class, 'update'])
            ->post('/videoManage/updateVideo', [VideoAdminController::class, 'update'])
            ->get('/videoApiManage', [VideoApiAdminController::class, 'index'])
            ->post('/videoApiManage', [VideoApiAdminController::class, 'index'])
            ->get('/videoApiManageDetail', [VideoApiAdminController::class, 'detail'])
            ->get('/searchVideoApi', [VideoApiAdminController::class, 'search'])
            ->post('/searchVideoApi', [VideoApiAdminController::class, 'search'])
            ->get('/categoryManage', [CategoryAdminController::class, 'index'])
            ->post('/categoryManage', [CategoryAdminController::class, 'index'])
            ->get('/categoryManage/createCategory', [CategoryAdminController::class, 'create'])
            ->post('/categoryManage/createCategory', [CategoryAdminController::class, 'create'])
            ->get('/categoryManage/updateCategory', [CategoryAdminController::class, 'update'])
            ->post('/categoryManage/updateCategory', [CategoryAdminController::class, 'update'])
            ->get('/admin', [HomeAdminController::class, 'index'])
            ->get('/signinAdmin', [AuthAdminController::class, 'index'])
            ->post('/signinAdmin', [AuthAdminController::class, 'index'])
            ->get('/signoutAdmin', [AuthAdminController::class, 'signout']);
        try {
            $route->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
        } catch (\Exception $e) {
            throw new RouteNotFoundException();
        }
    }
}
