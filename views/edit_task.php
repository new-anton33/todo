<div id="content">
    <h2>Редактирование задачи</h2>

    <form action="" method="post" enctype="multipart/form-data">

        <input class="form-control" id="username" name="username" placeholder="Имя" value="<? echo $array_data['username']; ?>" type="text"/><br>

        <input class="form-control" id="email" name="email" placeholder="Email" value="<? echo $array_data['email']; ?>" type="text"/><br>

        <input class="form-control" id="title" name="title" placeholder="Заголовок" value="<? echo $array_data['title']; ?>" type="text"/><br>

        <label>Картинка</label> <img width="50" id="blah" src="/images/<? echo $array_data['img']; ?>" alt="your image" />
        <input id="img" name="img" type="file"/><input name="old_img" type="hidden" value="<? echo $array_data['img']; ?>"/><br>

        <textarea class="form-control" id="descr" name="descr"><? echo $array_data['descr']; ?></textarea><br>

        <label>Закрыть</label> <input type="checkbox" name="status" value="1"/><br><br>

        <input class="btn btn-success" name="submit" type="submit" value="Сохранить"/>

        <input class="btn btn-success" id="review" type="button" value="Предосмотр"/>

    </form>
</div>

<div id="modalReview" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Предварительный просмотр</h4>
            </div>
            <div class="modal-body" id="modal_box">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>