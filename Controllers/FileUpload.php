<?php

class FileUpload
{
    public function uploadFile()
    {
        if ($_FILES["file"]["name"] != '') {
            $location = '../aw/uploads/' . $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $location);
        }
    }
}