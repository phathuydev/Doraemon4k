<?php

namespace App\Controllers;

class BaseController
{
    public function model($folder, $model)
    {
        if (file_exists(_DIR_ROOT . '/app/Models/' . $folder . '/' . $model . '.php')) {
            require_once _DIR_ROOT . '/app/Models/' . $folder . '/' . $model . '.php';
            if (class_exists($model)) {
                $model = new $model();
                return $model;
            }
        }
        return false;
    }
    public function render($view, $data = array())
    {
        if (isset($data)) {
            extract($data);
        }
        if (file_exists(_DIR_ROOT . '/app/Views/' . $view . '.php')) {
            require_once _DIR_ROOT . '/app/Views/' . $view . '.php';
        }
    }
}
