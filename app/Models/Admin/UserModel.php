<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class UserModel extends BaseModel
{
  public function getAllUserAdminPage($perPage, $offset)
  {
    $data = $this->limit('users', $perPage, $offset);
    return $data;
  }
  public function getAllUserAdminPageWhere($perPage, $offset, $user_name)
  {
    $data = $this->whereLikeLimit('users', 'user_name', $user_name, '' . $perPage . ' OFFSET ' . $offset . '', '*');
    return $data;
  }
  public function countAllUserAdminPage()
  {
    $data = $this->count('users', 'user_id', 'count');
    return $data;
  }
  public function countAllUserAdminPageWhere($user_name)
  {
    $data = $this->count('users', 'user_id', 'count', 'user_name LIKE :user_name', ['user_name' => '%' . $user_name . '%']);
    return $data;
  }
}
