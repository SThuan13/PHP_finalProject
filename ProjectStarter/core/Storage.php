<?php 

class Storage
{
    public static function download($files)
    {

    }

    //usage: Storage::upload('path', $_FILES)
    public static function upload($path, $file)
    {
        $targetDir = __DIR__ . "/../public/storage/$path/"; //Set target directory to save file
        $fileName = "";

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $key = array_key_first($file);

        if (isset($file[$key])) {
            $fileMetadata = $file[$key];
            $fileNames = $file[$key]["name"]; //Set file name to variable $fileName

            //if multi file upload
            if (is_array($fileNames)) {
                foreach ($fileNames as $key => $fileName) {
                    if ($fileMetadata['error'][$key] > 0) {
                        return false;
                    } else {
                        move_uploaded_file($fileMetadata['tmp_name'][$key], $targetDir . $fileName);
                    }
                }
            }
            // if single file upload
            else {
                if ($fileMetadata['error'] > 0) {
                    return false;
                } else {
                    move_uploaded_file($fileMetadata['tmp_name'][$key], $targetDir . $fileName);
                }
            }
        }
    }


    public function get()
    {
        
    }
}