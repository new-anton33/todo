<div id="content">
    <h2>Список задач</h2>
    <table id="list_tasks" class="display" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Имя пользователя</th>
            <th>Email</th>
            <th>Задача</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?

        foreach($array_data as $task) {

            if($task['status']==0) {
                $status = (!empty($_SESSION['admin']) && $_SESSION['admin'] == 1)? '<a class="btn btn-danger" href="/todo/edit/'.$task['id'].'">Редактировать</a>' :'В работе';
            } else {
                $status = 'Закрыто';
            }

            echo '<tr>
            <td>'.$task['username'].'</td>
            <td>'.$task['email'].'</td>
            <td><a href="/todo/task/'.$task['id'].'" target="_blank">'.$task['title'].'</a></td>
            <td>'.$status.'</td>
        </tr>';

        }
        ?>
        </tbody>
    </table>
<br><br>
    <a href="/todo/add" class="btn btn-success">Добавить задачу</a>
</div>