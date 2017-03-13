<?php
/**
 * Created by PhpStorm.
 * User: dusty
 * Date: 23.01.17
 * Time: 20:57
 */

class System
{
    public static function generateRandomString($length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function generateFolder($root_folder)
    {
        $folder = '';

        while (file_exists($root_folder . '/' . $folder))
        {
            $folder = self::generateRandomString();
        }
        mkdir($root_folder . '/' . $folder);
        return $folder;
    }

    public static function post($key = NULL, $default = NULL)
    {
        if ($key !== NULL)
        {
            if (isset($_POST[$key])) return $_POST[$key];

            return $default;
        }

        return $_POST;
    }

    public static function setMessage($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function getMessage($key)
    {
        $result = NULL;
        
        if (isset($_SESSION[$key]))
        {
            $result = $_SESSION[$key];

            unset($_SESSION[$key]);
        }

        return $result;
    }
}
