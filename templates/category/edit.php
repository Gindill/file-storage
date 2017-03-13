<?php
/**
 * Created by PhpStorm.
 * User: dusty
 * Date: 23.01.17
 * Time: 19:43
 */

$id ='';
$name = '';

if (!$new)
{
  $id = $category->id;
  $name = $category->name;
}

?>

<form class="form" role="form" method="post" action="/category/save/<?= $id ?>" enctype="multipart/form-data">
  <div class="form-group">
    <label for="category-name" class="">Название категории</label>
    <input type="text" class="form-control" id="category-name" name="category-name" placeholder="<?= $name ?>">
  </div>
  <button type="submit" class="btn btn-success">Отправить</button>
</form>
