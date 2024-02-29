<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class UserModel extends BaseModel
{
  public function getAllUserAdminPageWhere($perPage, $offset, $user_name)
  {
    $data = $this->whereLikeLimit('users', 'user_name', $user_name, '' . $perPage . ' OFFSET ' . $offset . '', '*');
    return $data;
  }
}
