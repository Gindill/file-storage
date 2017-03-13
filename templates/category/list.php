<?php

$this->title = UP_HOST_NAME . ' - Список категорий';

?>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <td>Название</td>
      <td></td>
    </tr>
  </thead>
<?php
    foreach ($categories as $category) {
?>
      <tr>
        <td><?= $category->name ?></td>
        <td>
          <form role="form" action="/category/edit/<?= $category->id ?>">
              <button type="submit" class="btn btn-success">Редактировать</button>
          </form>
          <form role="form" action="/category/delete/<?= $category->id ?>">
              <button type="submit" class="btn btn-danger">Удалить</button>
          </form>
        </td>
      </tr>
<?php
    }
?>
</table>
<form role="form" action="/category/insert">
    <button type="submit" class="btn btn-success">Добавить</button>
</form>
