<?php

namespace App\Models\Client;

use App\Models\BaseModel;

class HomeModel extends BaseModel
{
  public function getAllVideoNewLitmit40()
  {
    $data = $this->getAll('videos ORDER BY created_at DESC LIMIT 40', '*');
    return $data;
  }
}
