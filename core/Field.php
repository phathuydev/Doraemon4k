<?php

namespace Core;

class Field
{
  public const TYPE_TEXT = 'text';
  public const TYPE_PASSWORD = 'password';
  public const TYPE_NUMBER = 'number';
  public const TYPE_FILE = 'file';

  public string $type;
  public string $attribute;

  public function __construct(string $attribute)
  {
    $this->type = self::TYPE_TEXT;
    $this->attribute = $attribute;
  }

  public function __toString()
  {
    return sprintf(
      '
      <div class="mb-3">
      <label class="form-label">%s</label>
      <input type="%s" name="%s" id="%s" placeholder="%s" maxlength="100" class="form-control bg-dark text-white small" accept="%s">
      </div>
    ',
      $this->getLabel($this->attribute),
      $this->type,
      $this->attribute,
      $this->attribute,
      $this->getLabel($this->attribute),
      $this->getAccept($this->attribute),
    );
  }
  public function passwordField()
  {
    $this->type = self::TYPE_PASSWORD;
    return $this;
  }
  public function numberField()
  {
    $this->type = self::TYPE_NUMBER;
    return $this;
  }
  public function fileField()
  {
    $this->type = self::TYPE_FILE;
    return $this;
  }
  public function labels(): array
  {
    return [
      'user_name' => 'Họ Và Tên',
      'email' => 'Email',
      'password' => 'Mật Khẩu',
      'cpassword' => 'Nhập Lại Mật Khẩu',
      'title' => 'Tiêu Đề',
      'name' => 'Thêm Tên',
      'describe' => 'Mô Tả',
      'image' => 'Thêm Ảnh Bìa',
      'video' => 'Thêm Video',
    ];
  }
  public function accept(): array
  {
    return [
      'image' => 'image/png, image/jpeg, image/jpg',
      'video' => 'video/mp4',
    ];
  }
  public function getLabel($attribute)
  {
    return $this->labels()[$attribute] ?? $attribute;
  }
  public function getAccept($attribute)
  {
    return $this->accept()[$attribute] ?? $attribute;
  }
}
