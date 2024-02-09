<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class CategoryModel extends BaseModel
{
  public function getAllCategory($perPage, $page)
  {
    $data = $this->limit('categories', $perPage, $page, '*');
    return $data;
  }
  public function countVideoCategory($category_id)
  {
    $data = $this->count('videos', 'video_id', 'count', 'category_id = :category_id', ['category_id' =>  $category_id]);
    return $data;
  }
  public function countAllCategory()
  {
    $data = $this->count('categories', 'category_id', 'count');
    return $data;
  }
  public function insertCategory($table, $data)
  {
    $this->insert($table, $data);
  }
  public function updateCategory($table, $data, $category_id)
  {
    $this->update($table, $data, 'category_id', $category_id);
  }
  public function deletedCategory($category_id)
  {
    $this->delete('categories', 'category_id', $category_id);
  }
  public function getCategoryWhereName($category_name)
  {
    $data = $this->getOne('categories', 'category_name', $category_name, 'category_name');
    return $data;
  }
  public function getCategoryEdit($category_id)
  {
    $data = $this->getOne('categories', 'category_id', $category_id, '*');
    return $data;
  }
}
