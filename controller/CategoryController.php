<?php
/**
 * Created by PhpStorm.
 * User: dusty
 * Date: 23.01.17
 * Time: 21:53
 */

class CategoryController extends Controller
{
    public function actionList()
    {
      $this->categories = Categories::order('name');

        $this->render('category/list.php', [
          'categories' => $this->categories,
        ]);
    }

    public function actionInsert()
    {
        $this->render('category/edit.php', [
          'new' => TRUE
        ]);
    }

    public function actionEdit($id)
    {
      $this->category = new Categories($id);

        $this->render('category/edit.php', [
          'category' => $this->category,
          'new' => FALSE
        ]);
    }

    public function actionSave($id)
    {
        if (empty($id))
        {
            $id = NULL;
        }

        $this->category = new Categories($id);

        if (isset($_POST['category-name']))
        {
            $this->category->name = $_POST['category-name'];
            $this->category->save();
        }

        header('Location: /category/list');
    }

    public function actionDelete($id)
    {
        $this->category = new Categories($id);
        $this->category->delete();

        header('Location: /category/list');
    }

}
