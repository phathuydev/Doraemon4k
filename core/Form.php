<?php

namespace Core;

class Form
{
  public static function formOpen($action = '', $method = 'get', $id = '')
  {
    echo sprintf('<form action="%s" method="%s" enctype="multipart/form-data" id="%s" onsubmit="return false;">', $action, $method, $id);
    return new Form();
  }
  public static function formClose()
  {
    return '</form>';
  }
  public static function formSubmit($loadPage, $dataHref, $id, $onclick, $labelSubmit)
  {
    echo sprintf('<div class="float-end mb-3">
      <a href="javascript:void(0)" onclick="loadPage(%s)" class="btn btn-outline-info me-1">Trở Lại</a>
      <button class="btn btn-outline-danger" type="button" data-href="' . _WEB_ROOT . '%s" id="%s" onclick="%s()">%s</button>
    </div>
    ', $loadPage, $dataHref, $id, $onclick, $labelSubmit);
  }
  public static function textarea($labels, $name, $id = '', $value = '')
  {
    echo sprintf('<div class="mb-3">
      <label class="form-label">%s</label>
      <textarea name="%s" rows="3" cols="30" class="form-control bg-dark text-white small" id="%s" maxlength="5000">%s</textarea>
    </div>', $labels, $name, $id, $value);
  }
  public static function err($id)
  {
    echo sprintf('<p class="text-danger mb-3" id="%s"></p>', $id);
  }
  public function field($attribute)
  {
    return new Field($attribute);
  }
}
