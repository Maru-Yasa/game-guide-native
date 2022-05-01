<?php 
require_once('conn.php');

class Game {


    static function all()
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM game")->fetchAll();
    }

    static function getById($id)
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM game WHERE `id`=$id")->fetch();
    }

    static function create($data)
    {
        $db = new Conn();
        $nama = $data['nama'];
        $banner = $data['banner'];
        $deskripsi = $data['deskripsi'];
        $sql = "INSERT INTO `game` (`id`, `nama`, `banner`, `deskripsi`) VALUES (NULL, '$nama', '$banner', '$deskripsi');";
        return $db->assoc($sql);
    }

    static function update($data)
    {
        $db = new Conn();
        $id = $data['id'];
        $data['id'] = null;
        $sql = "UPDATE `game` SET ";
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
        $sql = "DELETE FROM `game` WHERE `game`.`id` = $id ";
        $db->assoc($sql);
    }

}


?>