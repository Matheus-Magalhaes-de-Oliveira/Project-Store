<?php

namespace App\Services;


class UploadsService {
    public function upload($fileName, $filePath, $uploadDir, $allowedExtensions){
        $fileNameSplitec = explode('.', $fileName);
        $extensao = end($fileNameSplitec);
        if(!in_array(strtolower($extensao), $allowedExtensions)){
            throw new \Exception("extension {$extensao} not allowec. Allowed extension are: " . implode(", ", $allowedExtensions));
        }

        if(!is_file($filePath)){
            throw new \Exception("file {$filePath} not found");
        }

        $content = file_get_contents($filePath);

        $fileName = uniqid('upload'). '_' . $fileName;

        $newFullFileName = rtrim($uploadDir,'/').'/'. $fileName ;
        $storaged = file_put_contents($newFullFileName, $content);

        if(!$storaged){
            throw new \Exception("eror saving file {$newFullFileName} check the permission");
        }
        return \App\Config\Config::getUploadDir(). $fileName;
    }
}

?>