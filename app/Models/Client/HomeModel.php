<?php

namespace App\Models\Client;

use App\Models\BaseModel;

class HomeModel extends BaseModel
{
  public function getAllVideoNewLitmit40()
  {
    $data = $this->getAll('videos WHERE is_deleted = 0 ORDER BY created_at DESC LIMIT 60', '*');
    return $data;
  }
}
