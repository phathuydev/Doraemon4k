<?php
$this->render('inc/Admin/header', $subcontent);
$this->render('inc/Admin/sidebar', $subcontent);
$this->render('inc/Admin/navbar', $subcontent);
$this->render($pages, $subcontent);
$this->render('inc/Admin/footer', $subcontent);
