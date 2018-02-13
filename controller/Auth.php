<?php
class controller_Auth extends ControllerBase {

    public function Login() {

        if($this->model->Verification($this->post['login'], $this->post['password'])){
            $_SESSION['admin'] = 1;
            return Template::View('message', ['result'=>1,'msg'=>'Авторизация успешна!']);
        } else {
            return Template::View('message', ['result'=>0,'msg'=>'Ошибка авторизации!']);
        }

    }

    public function Logout() {

        $_SESSION['admin'] = 0;
        return Template::View('message', ['result'=>1,'msg'=>'Авторизация завершена!']);
    }

}
?>