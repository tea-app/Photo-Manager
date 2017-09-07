<?php
/*
    photo_managerデータベースのphotosテーブル操作
*/

class Photo
{
    /*
        @var PDO
    */
    private $connect;
    
    /*
        @var dbtable
    */
    private $dbtable = 'photos';
    
    public function __construct($connect)
    {
        $this->connect = $connect;
    }
    
    public function insert($filename)
    {
        $stmt = $this->connect->prepare('INSERT INTO ' . $this->dbtable . ' (filename) VALUES (:filename)');
        $stmt->bindValue(':filename', $filename, PDO::PARAM_STR);
        $stmt->execute();
    }
    
//    public function exists($id)
//    {
//        $stmt = $this->connect->prepare('SELECT * FROM ' . $this->dbtable . ' WHERE id = :id');
//        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
//        $stmt->execute();
//        $exists = $stmt->fetchAll();
//        
//        if ($exists[0]['id'] == null) { return false; }
//        return true;
//    }
    
//    public function select_by_file($filename)
//    {
//        if (! $this->exists($filename)) { return null; }
//        
//        $stmt = $this->connect->prepare('SELECT * FROM ' . $this->dbtable . ' WHERE filename = :filename');
//        $stmt->bindValue(':filename', $filename, PDO::PARAM_STR);
//        $stmt->execute();
//        $result = $stmt->fetchAll();
//        return $result;
//    }
    
//    public function select_by_tag($tag)
//    {
//        if (! $this->exists($id)) { return null }
//        
//        $stmt = $this->connect->prepare('SELECT * FROM ' . $this->dbtable . ' WHERE tag = :tag');
//        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
//        $stmt->execute();
//        $result = $stmt->fetchAll();
//        return $result;
//    }
    
}