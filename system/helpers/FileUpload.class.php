<?php
/**
 * Created by PhpStorm.
 * User: dusty
 * Date: 23.01.17
 * Time: 20:48
 */

class FileUpload {

    public static function upload($file, $path)
    {
        if ($file["error"] !== UPLOAD_ERR_OK) return NULL;

        $file_name = $path . "/" . $file["name"];

        if (move_uploaded_file($file["tmp_name"], iconv("UTF-8", "windows-1251", $file_name)))
        {
            return $file_name;
        }
        else
        {
            throw new ErrorException('File Upload failed: ' . $file_name);
        }
    }
}
