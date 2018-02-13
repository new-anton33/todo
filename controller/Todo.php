<?php
class controller_Todo extends ControllerBase {

    public function GetList() {

        $tasks = $this->model->GetTasks();

        return Template::View('list_tasks', $tasks);

    }

    public function Add(){

        if(!empty($this->post)){
            if($this->model->AddTask($this->post, $this->files)){
                return Template::View('message', ['result'=>1,'msg'=>'Успешно добавлено!']);
            } else {
                return Template::View('message', ['result'=>0,'msg'=>'Ошибка! Задача не добавлена.']);
            }

        } else {
            return Template::View('add_task', []);
        }

    }

    public function Task($id){

        $task = $this->model->GetTask($id);

        return Template::View('task', $task);

    }

    public function Edit($id){

        if(!empty($_SESSION['admin']) && $_SESSION['admin'] == 1) {
            $task = $this->model->GetTask($id);

            if (!empty($this->post)) {
                if ($this->model->UpTask($id, $this->post, $this->files)) {
                    return Template::View('message', ['result' => 1, 'msg' => 'Успешно обновлено!']);
                } else {
                    return Template::View('message', ['result' => 0, 'msg' => 'Ошибка! Задача не обновлена.']);
                }

            } else {
                return Template::View('edit_task', $task);
            }
        } else {
            return Template::View('message', ['result' => 0, 'msg' => 'Доступ запрещен!']);
        }

    }

}
?>