<?php
/**
 * Created by PhpStorm.
 * User: dusty
 * Date: 23.01.17
 * Time: 20:52
 */
// id url folder filename
/**
 * Class UploadedFile
 * @public filename string
 */
class UploadedFile extends model
{
    protected static $fields;
    protected static $field_types;
    public static $table = 'files';
    protected static $behaviours = [
        'category' => [
            'type' => 'one',
            'key' => 'category_id',
            'class' => 'Categories'
        ]
    ];
    protected static function generateURL()
    {
        do {
            $url = System::generateRandomString(5);
            $query = "SELECT COUNT(*) FROM `" . static::get_table() . "` WHERE `url` = '{$url}'";

            $result = mysqli_query(self::get_db(), $query);

            if (!($row = mysqli_fetch_row($result)))
            {
                throw new Exception('generate URL failed');
            }
        } while((int) $row[0] > 0);

        return $url;
    }

    public static function getFileByUrl($url)
    {

        $query = "SELECT * FROM `" . static::get_table() . "` WHERE `url` = '{$url}' LIMIT 1";
        $result = mysqli_query(self::get_db(), $query);

        if (!($row = mysqli_fetch_assoc($result)))
        {
            throw new Exception('file not found');
        }

        $class_name = static::class;
        $file = new $class_name();
        $file->load($row);

        return $file;
    }

    public function save()
    {
        if ($this->url === NULL)
        {
            $this->url = static::generateURL();
            $this->created = 'NOW()';
            $this->favore = 0;
        }
        return parent::save();
    }
}
