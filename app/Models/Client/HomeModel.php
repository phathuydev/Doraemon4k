<?php

namespace App\Models\Client;

use App\Models\BaseModel;

class HomeModel extends BaseModel
{
  public function getAllVideoNewLitmit40()
  {
    $data = $this->getAll('videos INNER JOIN categories ON videos.category_id = categories.category_id ORDER BY videos.created_at DESC LIMIT 40', '*, videos.created_at as created_at_video');
    return $data;
  }
  public function getAllCategoryHome()
  {
    $data = $this->getAll('categories');
    return $data;
  }
}
