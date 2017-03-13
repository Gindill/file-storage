<?php

$this->title = UP_HOST_NAME . ' - Список файлов';

$page = 0;
$prev_status = '';
$next_status = '';
$num_rows = 10;

if (isset($_POST['page']))
{
  $page = (int) $_POST['page'];
}

if ($page === 0)
{
  $prev_status = 'disabled';
}

if ((($page + 1) * $num_rows) > count($files))
{
  $next_status = 'disabled';
}

?>

<form class="" role="form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="list">
    <label class="" for="select_category">Показать</label>
    <select class="" name="category_id" id="select_category">
<?php
    $selected = '';
    if ((int)$category_id === -1)  $selected = 'selected';
?>
      <option value="-1" <?= $selected ?>>Все</option>
<?php
    $selected = '';
    if ((int)$category_id === 0)  $selected = 'selected';
?>
      <option value="0" <?= $selected ?>>Без категории</option>
<?php foreach ($categories as $category) {
        $selected = '';
        if ((int)$category->id === (int)$category_id)  $selected = 'selected';
?>
      <option value="<?= $category->id ?>" <?= $selected ?>><?= $category->name ?></option>
<?php }
?>
    </select>
    <button type="submit" class="btn btn-success">ОК</button>
</form>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <td>Файл</td>
      <td>Категория</td>
      <td>Добавлен</td>
      <td>Популярность</td>
      <td></td>
    </tr>
  </thead>
<?php
    $min_index = $page * $num_rows;
    $max_index = ($page + 1) * $num_rows;
    if ($max_index > count($files))
    {
      $max_index = count($files);
    }

    for ($i = $min_index; $i < $max_index; $i++) {
      $file = $files[$i];
?>
      <tr>
        <td><?= $file->filename ?></td>
        <td><?= $file->category->name ?></td>
        <td><?= $file->created ?></td>
        <td><?= $file->favore ?></td>
        <td>
          <form role="form" action="/file/download/<?= $file->url ?>" target="_blank">
              <button type="submit" class="btn btn-success">Скачать</button>
          </form>
        </td>
      </tr>
<?php
    }
?>
</table>
<form role="form" method="post">
    <button type="submit" class="btn btn-success"
        name="page" value="<?= $page - 1 ?>" <?= $prev_status ?>>
          Предыдущие <?= $num_rows ?></button>
    <button type="submit" class="btn btn-success"
        name="page" value="<?= $page + 1 ?>" <?= $next_status ?>>
          Следующие <?= $num_rows ?></button>
</form>
