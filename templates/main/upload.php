<?php
/**
 * Created by PhpStorm.
 * User: dusty
 * Date: 23.01.17
 * Time: 20:28
 */
$title = UP_HOST_NAME;

$this->registerCssFile("/assets/css/index.css");

$this->title = UP_HOST_NAME . ' - Загрузить файл';
?>

<div class="index-form">
    <h1><?= $title ?></h1>
    <form class="form-inline" role="form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="upload">
        <div class="form-group">
            <input type="file" class="" name="file-upload">
        </div>
        <div class="form-group">
            <select class="form-control" name="category_id">
              <option value="0">Без категории</option>
<?php foreach ($categories as $category) {
?>
              <option value="<?= $category->id ?>"><?= $category->name ?></option>
<?php }
?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Загрузить</button>
    </form>
</div>
