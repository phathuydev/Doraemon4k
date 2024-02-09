<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class HomeModel extends BaseModel
{
  public function countUserDashboard()
  {
    $data = $this->count('users', 'user_id', 'count', 'user_role = :1', ['1' => 1]);
    return $data;
  }
  public function countLikeDashboard()
  {
    $data = $this->count('likes', 'like_id');
    return $data;
  }
  public function countViewDashboard()
  {
    $data = $this->count('views', 'view_id');
    return $data;
  }
}
