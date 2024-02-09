<?php

namespace App\Models\Client;

use App\Models\BaseModel;

class HomeModel extends BaseModel
{
  public function getAllVideoNewLitmit30()
  {
    $data = $this->join('videos', 'categories', 'videos.category_id = categories.category_id ORDER BY videos.created_at DESC LIMIT 30', '*, videos.created_at as created_at_video');
    return $data;
  }
  public function getAllCategoryHome()
  {
    $data = $this->getAll('categories');
    return $data;
  }
}
