<?php
/**
 * Created by PhpStorm.
 * User: Dusty
 * Date: 13.01.2017
 * Time: 21:44
 */

class Controller {

    public $layout = 'main.php';

    public function render($template_path, $data)
    {
        $template = new Template();

        $template->layout = $this->layout;
        $template->template = $template_path;

        $template->render($data);
    }

    public function e404()
    {
        header("HTTP/1.1 404 Not Found");
        $this->render('error.php', [
            'error' => 'Ошибка 404',
            'message' => 'Вы открыли несуществующую страницу',
            'page' => '/',
            'a_message' => 'На главную'
        ]);
    }

    public function __call($method, $data)
    {
        $this->e404();
    }
}
