<?php

class Login
{
    public function get()
    {
        session_start();
        if (session_id() && isset($_SESSION['user'])) {
            header('Location: /');
            die;
        }
        include 'template/login.php';
    }

    public function post()
    {
        if (isset($_POST['login']) && isset($_POST['senha'])) {
            $model = new Model;
            $login = $model->checkLogin($_POST['login'], $_POST['senha']);
            if ($login) {
                session_start();
                $_SESSION['user'] = $_POST['login'];
                header('Location: /');
                die;
            }
        }
        header('Location: /login');
        die;
    }
}

class Logout
{
    public function get()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header('Location: /login');
        die;
    }
}

class Secure_Login
{
    public function __construct()
    {
        session_start();
        if (!session_id() || !isset($_SESSION['user'])) {
            header('Location: /login');
            die;
        }
    }
}

class View extends Secure_Login
{
    public function get($slug = 'index')
    {
        $model = new Model;
        $page = $model->getPage($slug);
        if ($page) {
            $textile = new Textile();
            $page->content = preg_replace('/\[\[([^\]]+)\]\]/e', 'View::wiki_linkfy(\'$1\')', $page->content);
            $page->content = $textile->TextileThis($page->content);
            include 'template/page.php';
        } else {
            header('Location: /edit/'.$slug);
            die;
        }
    }

    public function wiki_linkfy($text)
    {
        $link = '<a href="%s" title="%s">%s</a>';
        $href = preg_replace('~[^\\pL\d]+~u', '-', $text);
        $href = trim($href, '-');
        $href = iconv( 'UTF-8', 'US-ASCII//TRANSLIT', $href );
        return sprintf($link, $href, $text, $text);
    }
}

class Remove extends Secure_Login
{
    public function get($slug)
    {
        $model = new Model;
        $model->removePage($slug);
        header('Location: /'.$slug);
        die;
    }
}

class Edit extends Secure_Login
{
    public function get($slug) {
        $model = new Model;
        $page = $model->getPage($slug);
        if ($page) {
            include 'template/edit_page.php';
        } else {
            include 'template/page_not_writed.php';
        }
    }

    public function post($slug)
    {
        $model = new Model;
        $model->savePage($slug, $_POST);
        header('Location: /'.$slug);
    }
}
