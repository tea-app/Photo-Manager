<?php

class Search
{
    private $connect;
    
    public function __construct($connect)
    {
        $this->connect = $connect;
    }
    
    public function byTag($tag)
    {
        $stmt = $this->connect->prepare('SELECT * FROM tagnames WHERE name = :name');
        $stmt->bindValue(':name', $tag, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $tag_id = $result[0]['tag_id'];
        
        $stmt = $this->connect->prepare('SELECT * FROM tags WHERE tag_id = :tag_id');
        $stmt->bindValue(':tag_id', $tag_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll();
        for($i=0; $i < count($result); $i++) {
            $id[] = $result[$i]['id'];
        }

        for($j=0; $j < count($id); $j++) {
            $stmt = $this->connect->prepare('SELECT * FROM photos WHERE id = :id');
            $stmt->bindValue(':id', $id[$j], PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $filename = $result[0]['filename'];
            $url[] = $filename;
        }
        return $url;
    }
}
