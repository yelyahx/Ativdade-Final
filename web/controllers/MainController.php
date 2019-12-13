<?php

require_once 'view/Login.php';

session_start();
class Main
{
    public function index()
    {
        if ((isset($_SESSION['idUser']) == true)) {
            if($_SESSION['isFuncionario'] == "true"){
                $view = new IndexFuncionario();
                $view->render($_SESSION);
            } else {
                $view = new IndexView();
                $view->render($_SESSION);
            }
        } else {
            $login = new LoginView();
            $login->render();
        }
    }
}
