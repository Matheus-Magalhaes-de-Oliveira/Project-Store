<?php

namespace App\Config;

class Config {
    static $BASE_URL = "http://localhost/NN/";   
    static $UPLOAD_DIR = "assets/uploads";
    static $UPLOAD_IMAGE_ALLOWED_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif'];

    /**
     * 
     * 
     * return full url
     * 
     * @return string
     */

    public static function url($uri=''){
        return rtrim(self::$BASE_URL,'/'). '/' .ltrim($uri,'/');
    }

    /**
     * 
     * 
     * return relative upload dir
     * 
     * @return string
     */
    public static function getUploadDir(){
        return rtrim(self::$UPLOAD_DIR,'/').'/';
    }

    /**
     * 
     * Return full path upload dir 
     * 
     * @return string
     */
    public static function getFullUploadDir(){
        return realpath(__DIR__.'/../../').'/'. self::$UPLOAD_DIR;
    }
}


?>