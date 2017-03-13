<?php
/**
 * Created by PhpStorm.
 * User: dusty
 * Date: 23.01.17
 * Time: 21:53
 */

class FileController extends Controller
{
    public function actionView($url)
    {
        $this->uploaded_file = UploadedFile::getFileByUrl($url);

        $this->render('file/download.php', [
            'file' => $this->uploaded_file,
        ]);
    }

    public function actionDownload($url)
    {
        $this->uploaded_file = UploadedFile::getFileByUrl($url);

        $uploaded_file = new UploadedFile($this->uploaded_file->id);
        $uploaded_file->favore += 1;
        $uploaded_file->save();

        header('Location: ' . $this->getUrl());
    }

    public function actionList()
    {
      $category_id = -1;
      $category_string = '1';

      if (isset($_POST['category_id']))
      {
        $category_id = $_POST['category_id'];
      }

      if ($category_id >= 0)
      {
        $category_string = "`category_id` = '{$category_id}'";
      }

      $this->files = UploadedFile::order('created', $category_string, 'DESC');
      $categories = new Categories();

      $this->render('file/list.php', [
          'files' => $this->files,
          'categories' => $categories->all(),
          'category_id' => $category_id
      ]);
    }

    public function getUrl()
    {
        return '/' . UP_UPLOADS_ROOT . '/' . $this->uploaded_file->folder
            . '/' . $this->uploaded_file->filename;
    }
}
