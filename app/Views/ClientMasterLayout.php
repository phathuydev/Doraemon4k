<?php
$this->render('inc/Client/header', $subcontent);
$this->render('inc/Client/navbar', $subcontent);
$this->render($pages, $subcontent);
$this->render('inc/Client/footer', $subcontent);
