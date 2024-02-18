<?php

namespace App\Core;

date_default_timezone_set('Asia/Ho_Chi_Minh');

class AppServiceProvider
{
  public function formatTimeAgo($timestamp)
  {
    $currentTimestamp = time();
    $difference = $currentTimestamp - $timestamp;
    $seconds = $difference;
    $minutes = round($difference / 60);
    $hours = round($difference / 3600);
    $days = round($difference / 86400);
    if ($seconds < 60) {
      return $seconds . " giây trước";
    } elseif ($minutes < 60) {
      return $minutes . " phút trước";
    } elseif ($hours < 24) {
      return $hours . " giờ trước";
    } elseif ($days < 30) {
      return $days . " ngày trước";
    } else {
      $months = round($days / 30);
      $years = round($days / 365);
      if ($months < 12) {
        return $months . " tháng trước";
      } else {
        return $years . " năm trước";
      }
    }
  }
  public function formatView($views)
  {
    if ($views < 1000) {
      return $views;
    } elseif ($views < 1000000) {
      return floor($views / 1000) . 'K';
    } else {
      return floor($views / 1000000) . 'M';
    }
  }
}
