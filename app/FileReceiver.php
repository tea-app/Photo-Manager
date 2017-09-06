<?php

class FileReceiver
{
    private $files;
    private $uploadfile;
    
    function __construct($files)
    {
        $this->files = $files;
        $this->uploadfile = __DIR__.'/img/'.$files['image']['name'];
    }
    
    function upload()
    {
        $result = move_uploaded_file($this->files['image']['tmp_name'], $this->uploadfile);
    }
}
