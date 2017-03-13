<?php
/**
 * Created by PhpStorm.
 * User: dusty
 * Date: 23.01.17
 * Time: 20:28
 */
/* @var $file UploadedFile */

$title = UP_HOST_NAME . ' - Файл ' . $file->filename;

$this->registerCssFile("/assets/css/index.css");

$this->title = 'Скачать файл - ' . $file->filename;
?>

<div class="index-form">
    <h1><?= $title ?></h1>
    <form class="form-inline" role="form" action="/file/download/<?= $file->url ?>" target="_blank">
        <button type="submit" class="btn btn-success">Скачать</button>
    </form>
</div>
