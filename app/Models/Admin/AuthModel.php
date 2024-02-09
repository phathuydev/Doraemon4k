<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class AuthModel extends BaseModel
{
  public function getUserLogin($email)
  {
    $data = $this->getOne('users', 'user_email', $email);
    return $data;
  }
}
