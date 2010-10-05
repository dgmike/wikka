<?php

class Model extends PDO
{
    public function __construct()
    {
        parent::__construct('sqlite:banco.db');
    }

    public function checkLogin($login, $senha)
    {
        if (!trim($login) || !trim($senha)) {
            return false;
        }
        $stmt = $this->prepare('SELECT COUNT(id) AS c FROM user WHERE login = ? AND senha = ?');
        $stmt->bindParam(1, $login);
        $stmt->bindParam(2, md5($senha));
        $stmt->execute();
        $return = $stmt->fetch(PDO::FETCH_OBJ);
        return (bool) $return->c;
    }

    public function getPage($slug)
    {
        $stmt = $this->prepare('SELECT id, slug, title, content FROM page WHERE slug = ?');
        $stmt->bindParam(1, $slug);
        $stmt->execute();
        $page = $stmt->fetch(PDO::FETCH_OBJ);
        return $page;
    }

    public function savePage($slug, $data)
    {
        if (!trim($slug)) {
            return false;
        }
        $stmt = $this->prepare('SELECT COUNT(id) AS c FROM page WHERE slug = ?');
        $stmt->bindParam(1, $slug);
        $stmt->execute();
        $page = $stmt->fetch(PDO::FETCH_OBJ);
        if (!$page->c) {
            $stmt = $this->prepare('INSERT INTO page (slug, title, content) VALUES (?, ?, ?)');
            $stmt->bindValue(1, $slug, PDO::PARAM_STR);
            $stmt->bindValue(2, $data['title'], PDO::PARAM_STR);
            $stmt->bindValue(3, $data['content'], PDO::PARAM_STR);
        } else {
            $stmt = $this->prepare('UPDATE page SET title = ?, content = ? WHERE slug = ?');
            $stmt->bindParam(1, $data['title'], PDO::PARAM_STR);
            $stmt->bindParam(2, $data['content'], PDO::PARAM_STR);
            $stmt->bindParam(3, $slug, PDO::PARAM_STR);
        }
        $stmt->execute();
    }

    public function removePage($slug)
    {
        $stmt = $this->prepare('DELETE FROM page WHERE slug = ?');
        $stmt->bindParam(1, $slug);
        $stmt->execute();
    }
}
