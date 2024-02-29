<?php

namespace App\Models\Client;

use App\Models\BaseModel;

class AuthModel extends BaseModel
{
  public function getUserSignin($email)
  {
    $data = $this->getOne('users', 'user_email', '=', $email);
    return $data;
  }
  public function insertUser($table, $data)
  {
    $this->insert($table, $data);
  }
  public function resetPass($data, $user_id)
  {
    $this->update('users', $data, 'user_id', $user_id);
  }
}
