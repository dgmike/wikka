<?php

error_reporting(E_ALL);

include 'classTextile.php';
include 'controller.php';
include 'model.php';
include 'ice/app.php';

app(array(
    // Administracao
    '^/admin/(\w+)/(\w+)/?$'  => 'Admin_Action',
    '^/admin/(\w+)/?$'        => 'Admin_Action',
    '^/admin/?$'              => 'Admin_Index',
    // Telas principais
    '^/login/?$'              => 'Login',
    '^/logout/?$'             => 'Logout',
    '^/remove/([\w\d_-]+)/?$' => 'Remove',
    '^/edit/([\w\d_-]+)/?$'   => 'Edit',
    '^/([\w\d_-]+)?/?$'       => 'View',
), $_SERVER['REQUEST_URI']);
