<?php
/**
 * Created by PhpStorm.
 * User: dusty
 * Date: 23.01.17
 * Time: 20:27
 */

require_once "system/helpers/FileUpload.class.php";

class MainController extends Controller
{
    public function actionUpload()
    {
        if (System::post('action') === 'upload')
        {
          if (isset($_FILES['file-upload']))
          {
            $file = $_FILES['file-upload']; // TODO проверка всего - размер и т.п.

            $folder = System::generateFolder(UP_UPLOADS_ROOT);

            if (FileUpload::upload($file, UP_UPLOADS_ROOT . '/' . $folder))
            {
                $file_name = $file["name"];

                $uploaded_file = new UploadedFile();
                $uploaded_file->filename = $file_name;
                $uploaded_file->folder = $folder;
                $uploaded_file->category_id = $_POST['category_id'];

                if ($uploaded_file->save())
                {
                    System::setMessage('success', 'Ура! Файл загружен! Ссылка на файл: <a href="/file/view/' . $uploaded_file->url . '">здесь</a>');
                }
                else
                {
                    System::setMessage('error', 'К сожалению, загрузить файл не удалось');
                }

                header("Location: /main/message");
                exit();
            }
          }
        }

        $categories = new Categories();
        $this->render('main/upload.php', [
          'categories' => $categories->all()
        ]);
    }

    public function actionMessage()
    {
        $message = '';
        $message_class = '';

        if ($message = System::getMessage('success'))
        {
            $message_class = 'alert-success text-center';
        }
        else if ($message = System::getMessage('error'))
        {
            $message_class = 'alert-danger text-center';
        }

        $this->render('main/message.php', [
            'message' => $message,
            'class' => $message_class
        ]);
    }
}
