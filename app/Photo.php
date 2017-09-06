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
    
}