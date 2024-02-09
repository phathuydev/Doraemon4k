<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class VideoModel extends BaseModel
{
  public function getAllVideo($perPage, $offset, $video_form)
  {
    $data = $this->getJoinLimit('videos', 'categories', 'videos.category_id = categories.category_id WHERE video_form = ' . $video_form . '', '' . $perPage . ' OFFSET ' . $offset . '', '*, videos.created_at as created_at_video');
    return $data;
  }
  public function getAllVideoWhere($perPage, $offset, $kw, $video_form)
  {
    $data = $this->getJoinLimitWhereLike('videos', 'categories', 'videos.category_id = categories.category_id', 'videos.video_form = ' . $video_form . ' AND videos.video_title', $kw, '' . $perPage . ' OFFSET ' . $offset . '', '*, videos.created_at as created_at_video');
    return $data;
  }
  public function getAllCategory()
  {
    $data = $this->getAll('categories');
    return $data;
  }
  public function insertVideo($data)
  {
    $this->insert('videos', $data);
  }
  public function updateVideo($data, $video_id)
  {
    $this->update('videos', $data, 'video_id', $video_id);
  }
  public function deleteVideo($video_id)
  {
    $this->delete('videos', 'video_id', $video_id);
  }
  public function countAllVideo($video_form)
  {
    $data = $this->count('videos', 'video_id', 'count', 'video_form = :video_form', ['video_form' => $video_form]);
    return $data;
  }
  public function countAllVideoSearch($kw, $video_form)
  {
    $data = $this->count('videos', 'video_id', 'count', 'video_title LIKE :video_title AND video_form = :video_form', ['video_title' => '%' . $kw . '%', 'video_form' => $video_form]);
    return $data;
  }
  public function getVideoEdit($video_id)
  {
    $data = $this->getOne('videos', 'video_id', $video_id, '*');
    return $data;
  }
  public function getVideoSlug($video_slug)
  {
    $data = $this->getOne('videos', 'video_slug', $video_slug, '*');
    return $data;
  }
}
