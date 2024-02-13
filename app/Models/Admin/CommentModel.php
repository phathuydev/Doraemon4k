<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class CommentModel extends BaseModel
{
  public function getAllComment($perPage, $offset)
  {
    $data = $this->getAll('comments INNER JOIN users ON comments.user_id = users.user_id LIMIT ' . $perPage . ' OFFSET ' . $offset . '');
    return $data;
  }
  public function getAllVideo($video_id)
  {
    $data = $this->getAll('videos WHERE video_id = ' . $video_id . '');
    return $data;
  }
  public function countAllComment()
  {
    $data = $this->count('comments', 'comment_id', 'count');
    return $data;
  }
}
