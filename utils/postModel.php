<?php
require_once('conn.php');

class Post {


    static function all()
    {
        $db = new Conn();
        return array_reverse($db->assoc("SELECT * FROM posts")->fetchAll());
    }

    static function getById($id)
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM posts WHERE `id`=$id")->fetch();
    }

    static function create($data)
    {
        $db = new Conn();
        $judul = $data['judul'];
        $deskripsi = $data['deskripsi'];
        $konten = $data['konten'];
        $game_id = $data['game_id'];
        $author = $data['author'];
        $sql = "INSERT INTO `posts` (`id`, `judul`, `deskripsi`, `konten`, `game_id`, `author`, `created_at`) VALUES (NULL, '$judul', '$deskripsi', '$konten', '$game_id', '$author', current_timestamp())";
        return $db->assoc($sql);
    }

    static function update($data)
    {
        $db = new Conn();
        $id = $data['id'];
        $data['id'] = null;
        $sql = "UPDATE `posts` SET ";
        foreach ($data as $key => $value) {
            if($value !== null){
                $sql .= "`$key` = '$value',";
            }
        }
        $sql = rtrim($sql, ",");
        $sql .= " WHERE `id`='$id'";
        $db->assoc($sql);
    }

    static function delete($id)
    {
        $db = new Conn();
        $sql = "DELETE FROM `posts` WHERE `posts`.`id` = $id ";
        $db->assoc($sql);
    }

    static function countContentByAuthor(int $id)
    {
        $db = new Conn();
        $sql = "SELECT count(*) FROM posts WHERE `author`='$id'";
        return $db->assoc($sql)->fetch();
    }

}


?>
