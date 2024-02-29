<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class CategoryModel extends BaseModel
{
  public function getCategoryWhereName($category_name)
  {
    $data = $this->getOne('categories', 'category_name', '=', $category_name, 'category_name');
    return $data;
  }
}
